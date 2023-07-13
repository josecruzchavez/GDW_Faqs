<?php
namespace GDW\Faqs\Ui\Component\Form;

use GDW\Core\Helper\Data as GDWHelper;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\OptionSourceInterface;
use GDW\Faqs\Model\ResourceModel\FaqCategory\CollectionFactory as CategoryFaqCollectionFactory;

class CategoryFaq implements OptionSourceInterface
{
    protected $request;
    protected $gdwHelper;
    protected $dataTree = null;
    protected $categoryFaqCollectionFactory;

    public function __construct(
        CategoryFaqCollectionFactory $categoryFaqCollectionFactory,
        RequestInterface $request,
        GDWHelper $gdwHelper
    ) {
        $this->categoryFaqCollectionFactory = $categoryFaqCollectionFactory;
        $this->gdwHelper = $gdwHelper;
        $this->request = $request;
    }

    public function toOptionArray()
    {
        return $this->getDataTree();
    }

    protected function getDataTree()
    {
        if ($this->dataTree === null) {
            $DataById[] = [];
            $collection = $this->categoryFaqCollectionFactory->create();
            foreach ($collection as $data) {
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