<?php
namespace GDW\Faqs\Model\ResourceModel\Faq;
 
use GDW\Faqs\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\App\RequestInterface;     
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /** @var array<int|string, array<string, mixed>> */
    protected array $loadedData = [];
    protected RequestInterface $request;
    protected CollectionFactory $faqCollectionFactory;

    /**
     * @param array<string, mixed> $meta
     * @param array<string, mixed> $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        RequestInterface $request,
        CollectionFactory $faqCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->request = $request;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->collection = $faqCollectionFactory->create();
        
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array<int|string, array<string, mixed>>
     */
    public function getData(): array
    {
        $itemId = $this->request->getParam('id');
        if ($itemId) {

            if (!empty($this->loadedData)) {
                return $this->loadedData;
            }
            $items = $this->collection->getItems();
            /** @var \GDW\Faqs\Model\Faq $page */
            foreach ($items as $page) {
                $pageId = $page->getId();
                if ($pageId !== null) {
                    $pageData = $page->getData();
                    if (is_array($pageData)) {
                        $this->loadedData[$pageId] = $pageData;
                    }
                }
            }
            return $this->loadedData;   
        }
        return [];
    }
}