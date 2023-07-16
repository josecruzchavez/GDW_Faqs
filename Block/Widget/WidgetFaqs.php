<?php
namespace GDW\Faqs\Block\Widget;

use GDW\Faqs\Block\ProductFaqs;
use Magento\Widget\Block\BlockInterface;

class WidgetFaqs extends ProductFaqs implements BlockInterface
{
    protected $_template = 'widget/widget_faqs.phtml';
    
    public function getTypeDisplay()
    {
        return $this->getData('type_display') ?? 'current_product';
    }

    public function getStyle()
    {
        return $this->getData('style_display') ?? 'style_none';
    }

    public function hasFaqs()
    {
        $type = $this->getTypeDisplay();
        if($type == 'current_product'){
            return $this->faqsHelper->hasFaqsCurrentProduct();
        }elseif($type == 'other_product'){
            $sku = $this->getData('other_product_sku') ?? '';
            if($sku != ''){
                return $this->faqsHelper->hasFaqsOtherProduct($sku);
            }
        }elseif($type == 'faq_category'){
            $id = $this->getData('faq_category_id') ?? '';
            if($id != ''){
                return $this->faqsHelper->hasFaqsCategory($id);
            }
        }
        return FALSE;
    }

    public function getFaqs()
    {
        $type = $this->getTypeDisplay();
        if($type == 'current_product'){
            return $this->faqsHelper->getFaqsCurrentProduct();
        }elseif($type == 'other_product'){
            $sku = $this->getData('other_product_sku') ?? '';
            if($sku != ''){
                return $this->faqsHelper->getFaqsOtherProduct($sku);
            }
        }elseif($type == 'faq_category'){
            $id = $this->getData('faq_category_id') ?? '';
            if($id != ''){
                return $this->faqsHelper->getFaqsCategory($id);
            }
        }
        return;
    }

}
