<?php
namespace GDW\Faqs\Ui\Component\Form;

use GDW\Core\Helper\Data as GDWHelper;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

class Products implements OptionSourceInterface
{
    protected $request;
    protected $gdwHelper;
    protected $productTree = null;
    protected $productCollectionFactory;

    public function __construct(
        ProductCollectionFactory $productCollectionFactory,
        RequestInterface $request,
        GDWHelper $gdwHelper
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->gdwHelper = $gdwHelper;
        $this->request = $request;
    }

    public function toOptionArray()
    {
        return $this->getProductTree();
    }

    protected function getProductTree()
    {
        if ($this->productTree === null) {
            $collection = $this->productCollectionFactory->create();
            $collection->addAttributeToSelect(['name', 'sku', 'entity_id']);
            foreach ($collection as $product) {
                $productId = $product->getEntityId();
                if (!isset($ProductById[$productId])) {
                    $ProductById[$productId] = ['value' => $productId];
                }
                $ProductById[$productId]['label'] = $product->getEntityId().' | '.$product->getSku().' | '. $product->getName();
            }
            $this->productTree = $ProductById;
        }
        return $this->productTree;
    }
}