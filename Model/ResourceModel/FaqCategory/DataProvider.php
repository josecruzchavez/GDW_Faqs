<?php
namespace GDW\Faqs\Model\ResourceModel\FaqCategory;
 
use GDW\Faqs\Model\ResourceModel\FaqCategory\CollectionFactory;
use Magento\Framework\App\RequestInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /** @var array<int|string, array<string, mixed>> */
    protected array $loadedData = [];
    protected RequestInterface $request;
    protected CollectionFactory $faqCategoryCollectionFactory;

    /**
     * @param array<string, mixed> $meta
     * @param array<string, mixed> $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        RequestInterface $request,
        CollectionFactory $faqCategoryCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->request = $request;
        $this->faqCategoryCollectionFactory = $faqCategoryCollectionFactory;
        $this->collection = $faqCategoryCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array<int|string, array<string, mixed>>
     */
    public function getData(): array
    {
        $itemId = $this->request->getParam('category_id');
        if ($itemId) {

            if (!empty($this->loadedData)) {
                return $this->loadedData;
            }
            $items = $this->collection->getItems();
            /** @var \GDW\Faqs\Model\FaqCategory $page */
            foreach ($items as $page) {
                $pageId = $page->getCategoryId();
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