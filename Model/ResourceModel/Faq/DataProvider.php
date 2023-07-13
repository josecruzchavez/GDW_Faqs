<?php
namespace GDW\Faqs\Model\ResourceModel\Faq;
 
use GDW\Faqs\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\App\RequestInterface;     
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $request;
    protected $faqCollectionFactory;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        RequestInterface $request,
        CollectionFactory $faqCollectionFactory,
        array $meta = [],
        array $data = [],
        
    ) {
        $this->request = $request;
        $this->collection = $faqCollectionFactory->create();
        
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }



    public function getData()
    {
        $itemId = $this->request->getParam('id');
        if($itemId){
            
            if (isset($this->loadedData)) {
                return $this->loadedData;
            }
            $items = $this->collection->getItems();
            foreach ($items as $page) {
                $this->loadedData[$page->getId()] = $page->getData();
            }
            return $this->loadedData;   
        }
        return [];
    }
}