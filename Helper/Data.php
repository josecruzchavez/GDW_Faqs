<?php
namespace GDW\Faqs\Helper;
use GDW\Core\Helper\Data as GdwHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\App\Helper\AbstractHelper;
use GDW\Faqs\Model\ResourceModel\Faq\CollectionFactory as FaqCollection;
use GDW\Faqs\Model\ResourceModel\FaqCategory\CollectionFactory as FaqCategoryCollection;

class Data extends AbstractHelper
{
    protected $context;
    protected $gdwHelper;
    protected $faqCollection;
    protected $filterProvider;
    protected $faqCategoryCollection;

    public function __construct(
        Context $context,
        GdwHelper $gdwHelper,
        FaqCollection $faqCollection,
        FilterProvider $filterProvider,
        FaqCategoryCollection $faqCategoryCollection
    ){
		parent::__construct($context);
		$this->gdwHelper = $gdwHelper;
        $this->faqCollection = $faqCollection;
        $this->filterProvider = $filterProvider;
        $this->faqCategoryCollection = $faqCategoryCollection;
    }

    public function hasFaqsCurrentProduct():bool
    {
        $collection = $this->getFaqsCurrentProduct();
        if($collection->getSize() > 0){
            return TRUE;
        }
        return FALSE;
    }

    public function getFaqsCurrentProduct()
    {
        $product = $this->gdwHelper->getCurrentProduct();
        $collection = $this->faqCollection->create();
        $collection->getSelect('*')->order('order ASC');
        $collection->addFieldToFilter('status', 1);
            if($product){
                $productId = $product->getEntityId();
                $collection->addFieldToFilter('product_id',['in' => $productId]);
            }
        return $collection;
    }

    public function hasFaqsOtherProduct($sku)
    {
        $collection = $this->getFaqsOtherProduct($sku);
        if($collection->getSize() > 0){
            return TRUE;
        }
        return FALSE;
    }

    public function getFaqsOtherProduct($sku)
    {
        $product = $this->gdwHelper->getObject('Magento\Catalog\Api\ProductRepositoryInterface')->get($sku);
        $collection = $this->faqCollection->create();
        $collection->getSelect('*')->order('order ASC');
        $collection->addFieldToFilter('status', 1);
            if($product->hasData()){
                $productId = $product->getEntityId();
                $collection->addFieldToFilter('product_id',['in' => $productId]);
            }
        return $collection;
    }

    public function hasFaqsCategory($id)
    {
        $collection = $this->getFaqsCategory($id);
        if($collection->getSize() > 0){
            return TRUE;
        }
        return FALSE;
    }

    public function getFaqsCategory($id)
    {
        $collection = $this->faqCollection->create();
        $collection->getSelect('*')->order('order ASC');
        $collection->addFieldToFilter('status', 1);
        $collection->addFieldToFilter('category_faq_id',$id);
        return $collection;
    }

    public function hasAllFaqsCurrentProduct():bool
    {
        $collection = $this->getAllFaqsCurrentProduct();
        if($collection->getSize() > 0){
            return TRUE;
        }
        return FALSE;
    }

    public function getAllFaqsCurrentProduct()
    {
        $product = $this->gdwHelper->getCurrentProduct();
        $collection = $this->faqCollection->create();
        $collection->getSelect('*')->order('order ASC');
        /* $collection->addFieldToFilter('status', 1); */
            if($product){
                $productId = $product->getEntityId();
                $collection->addFieldToFilter('product_id',['in' => $productId]);
            }
        return $collection;
    }


    public function getHtmlVal($val)
    {
        return $this->filterProvider->getPageFilter()->filter($val);
    }
}
