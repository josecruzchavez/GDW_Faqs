<?php
namespace GDW\Faqs\Ui\Component\Form;

use GDW\Core\Helper\Data as GDWHelper;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\OptionSourceInterface;
use GDW\Faqs\Model\ResourceModel\FaqCategory\CollectionFactory as CategoryFaqCollectionFactory;

class CategoryFaq implements OptionSourceInterface
{
    protected RequestInterface $request;
    protected GDWHelper $gdwHelper;
    /** @var array<int, array{value:mixed, label:string}>|null */
    protected ?array $dataTree = null;
    protected CategoryFaqCollectionFactory $categoryFaqCollectionFactory;

    public function __construct(
        CategoryFaqCollectionFactory $categoryFaqCollectionFactory,
        RequestInterface $request,
        GDWHelper $gdwHelper
    ) {
        $this->categoryFaqCollectionFactory = $categoryFaqCollectionFactory;
        $this->gdwHelper = $gdwHelper;
        $this->request = $request;
    }

    /**
     * @return array<int, array{value:mixed, label:string}>
     */
    public function toOptionArray()
    {
        return $this->getDataTree();
    }

    /**
     * @return array<int, array{value:mixed, label:string}>
     */
    protected function getDataTree(): array
    {
        if ($this->dataTree === null) {
            $DataById = [];
            $collection = $this->categoryFaqCollectionFactory->create();
            foreach ($collection as $data) {
                if (!is_object($data) || !method_exists($data, 'getCategoryId') || !method_exists($data, 'getName')) {
                    continue;
                }
                $dataId = $data->getCategoryId();
                if (!isset($DataById[$dataId])) {
                    $DataById[$dataId] = ['value' => $dataId];
                }
                $DataById[$dataId]['label'] = $data->getCategoryId().' | '.$data->getName();
            }
            $this->dataTree = $DataById;
        }
        return $this->dataTree;
    }
}