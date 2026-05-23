<?php
namespace GDW\Faqs\Helper;

use GDW\Core\Helper\Data as GdwHelper;
use GDW\Faqs\Model\ResourceModel\Faq\Collection as FaqCollectionModel;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\App\Helper\AbstractHelper;
use GDW\Faqs\Model\ResourceModel\Faq\CollectionFactory as FaqCollection;
use GDW\Faqs\Model\ResourceModel\FaqCategory\CollectionFactory as FaqCategoryCollection;

class Data extends AbstractHelper
{
    protected GdwHelper $gdwHelper;
    protected FaqCollection $faqCollection;
    protected FilterProvider $filterProvider;
    protected FaqCategoryCollection $faqCategoryCollection;
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        Context $context,
        GdwHelper $gdwHelper,
        FaqCollection $faqCollection,
        FilterProvider $filterProvider,
        FaqCategoryCollection $faqCategoryCollection,
        ProductRepositoryInterface $productRepository
    ){
        parent::__construct($context);
        $this->gdwHelper = $gdwHelper;
        $this->faqCollection = $faqCollection;
        $this->filterProvider = $filterProvider;
        $this->faqCategoryCollection = $faqCategoryCollection;
        $this->productRepository = $productRepository;
    }

    public function hasFaqsCurrentProduct():bool
    {
        $collection = $this->getFaqsCurrentProduct();
        if ($collection->getSize() > 0) {
            return true;
        }
        return false;
    }

    public function getFaqsCurrentProduct(): FaqCollectionModel
    {
        $product = $this->gdwHelper->getCurrentProduct();
        $collection = $this->faqCollection->create();
        $collection->getSelect()->order('order ASC');
        $collection->addFieldToFilter('status', ['eq' => 1]);
            if ($product instanceof ProductInterface) {
                $productId = (int) $product->getId();
                $collection->addFieldToFilter('product_id',['in' => $productId]);
            }
        return $collection;
    }

    public function hasFaqsOtherProduct(string $sku): bool
    {
        $collection = $this->getFaqsOtherProduct($sku);
        if ($collection->getSize() > 0) {
            return true;
        }
        return false;
    }

    public function getFaqsOtherProduct(string $sku): FaqCollectionModel
    {
        $product = $this->productRepository->get($sku);
        $collection = $this->faqCollection->create();
        $collection->getSelect()->order('order ASC');
        $collection->addFieldToFilter('status', ['eq' => 1]);
            $productId = $product->getId();
            if (is_scalar($productId) && (string) $productId !== '') {
                $collection->addFieldToFilter('product_id',['in' => $productId]);
            }
        return $collection;
    }

    public function hasFaqsCategory(int|string $id): bool
    {
        $collection = $this->getFaqsCategory($id);
        if ($collection->getSize() > 0) {
            return true;
        }
        return false;
    }

    public function getFaqsCategory(int|string $id): FaqCollectionModel
    {
        $collection = $this->faqCollection->create();
        $collection->getSelect()->order('order ASC');
        $collection->addFieldToFilter('status', ['eq' => 1]);
        $collection->addFieldToFilter('category_faq_id', ['eq' => $id]);
        return $collection;
    }

    public function hasAllFaqsCurrentProduct():bool
    {
        $collection = $this->getAllFaqsCurrentProduct();
        if ($collection->getSize() > 0) {
            return true;
        }
        return false;
    }

    public function getAllFaqsCurrentProduct(): FaqCollectionModel
    {
        $product = $this->gdwHelper->getCurrentProduct();
        $collection = $this->faqCollection->create();
        $collection->getSelect()->order('order ASC');
        /* $collection->addFieldToFilter('status', 1); */
            if ($product instanceof ProductInterface) {
                $productId = (int) $product->getId();
                $collection->addFieldToFilter('product_id',['in' => $productId]);
            }
        return $collection;
    }


    public function getHtmlVal(mixed $val): string
    {
        if (is_scalar($val)) {
            return $this->filterProvider->getPageFilter()->filter((string) $val);
        }

        return $this->filterProvider->getPageFilter()->filter(print_r($val, true));
    }
}
