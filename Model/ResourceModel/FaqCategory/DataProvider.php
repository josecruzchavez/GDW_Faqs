<?php
namespace GDW\Faqs\Model\ResourceModel\FaqCategory;
 
use GDW\Faqs\Model\ResourceModel\FaqCategory\CollectionFactory;
use Magento\Framework\App\RequestInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $request;
    protected $faqCategoryCollectionFactory;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        RequestInterface $request,
        CollectionFactory $faqCategoryCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->request = $request;
        $this->collection = $faqCategoryCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        $itemId = $this->request->getParam('category_id');
        if($itemId){
            
            if (isset($this->loadedData)) {
                return $this->loadedData;
            }
            $items = $this->collection->getItems();
            foreach ($items as $page) {
                $this->loadedData[$page->getCategoryId()] = $page->getData();
            }
            return $this->loadedData;   
        }
        return [];
    }
}