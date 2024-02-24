<?php
namespace GDW\Faqs\Model\ResourceModel\Faq\Grid;

use Psr\Log\LoggerInterface as Logger;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;

class Collection extends SearchResult
{
    protected $_idFieldName = 'id';

    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable = 'gdw_faqs_items',
        $resourceModel = 'GDW\Faqs\Model\ResourceModel\Faq',
        $identifierName = null,
        $connectionName = null
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel, $identifierName, $connectionName);
    }

    protected function _initSelect()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $request = $objectManager->get('Magento\Framework\App\Request\Http');
        $namespace = $request->getParam('namespace');
            if($namespace == 'gdw_product_faqs_items_listing'){
                $session = $objectManager->get('Magento\Framework\Session\Generic');
                $productId = $session->getCurrentProductIdByFaqs() ?? null;
                if($productId){
                    $this->addFieldToFilter('product_id', $productId);
                }
            }

        parent::_initSelect();

        $this->getSelect()->joinLeft(
                ['secondTable' => $this->getTable('catalog_product_entity')],
                'main_table.product_id = secondTable.entity_id',
                ['product_sku' => 'sku']
        );
        $this->getSelect()->joinLeft(
                ['threeTable' => $this->getTable('gdw_faqs_category')],
                'main_table.category_faq_id = threeTable.category_id',
                ['category_faq_name' => 'name']
        );
        $this->addFilterToMap('order', 'main_table.order');
        $this->addFilterToMap('faq', 'main_table.faq');
        $this->addFilterToMap('product_sku', 'secondTable.sku');
        $this->addFilterToMap('category_faq_name', 'threeTable.name');
    }
}
