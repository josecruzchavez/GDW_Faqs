<?php
namespace GDW\Faqs\Block\Widget;

use GDW\Faqs\Block\ProductFaqs;
use GDW\Faqs\Model\ResourceModel\Faq\Collection;
use Magento\Widget\Block\BlockInterface;

class WidgetFaqs extends ProductFaqs implements BlockInterface
{
    protected $_template = 'widget/widget_faqs.phtml';
    
    public function getTypeDisplay(): string
    {
        $type = $this->getData('type_display');
        return is_scalar($type) ? (string) $type : 'current_product';
    }

    public function getStyle(): string
    {
        $style = $this->getData('style_display');
        return is_scalar($style) ? (string) $style : 'style_none';
    }

    public function hasFaqs(): bool
    {
        $type = $this->getTypeDisplay();
        if ($type == 'current_product') {
            return $this->faqsHelper->hasFaqsCurrentProduct();
        } elseif ($type == 'other_product') {
            $sku = $this->getData('other_product_sku');
            if (is_scalar($sku) && (string) $sku !== '') {
                return $this->faqsHelper->hasFaqsOtherProduct((string) $sku);
            }
        } elseif ($type == 'faq_category') {
            $id = $this->getData('faq_category_id');
            if (is_scalar($id) && (string) $id !== '') {
                return $this->faqsHelper->hasFaqsCategory((string) $id);
            }
        }
        return false;
    }

    public function getFaqs(): ?Collection
    {
        $type = $this->getTypeDisplay();
        if ($type == 'current_product') {
            return $this->faqsHelper->getFaqsCurrentProduct();
        } elseif ($type == 'other_product') {
            $sku = $this->getData('other_product_sku');
            if (is_scalar($sku) && (string) $sku !== '') {
                return $this->faqsHelper->getFaqsOtherProduct((string) $sku);
            }
        } elseif ($type == 'faq_category') {
            $id = $this->getData('faq_category_id');
            if (is_scalar($id) && (string) $id !== '') {
                return $this->faqsHelper->getFaqsCategory((string) $id);
            }
        }
        return null;
    }

}
