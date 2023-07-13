<?php
namespace GDW\Faqs\Block\Widget;

use GDW\Faqs\Block\ProductFaqs;
use Magento\Widget\Block\BlockInterface;

class WidgetFaqs extends ProductFaqs implements BlockInterface
{
    protected $_template = 'widget/widget_faqs.phtml';
    
    public function getTypeDisplay()
    {
        $type = 'current_product';
        $typeData = $this->getData('type_display') ?? '';
        return $typeData != '' ? $typeData : $type;
    }

    public function getStyle()
    {
        $style = 'style_none';
        $styleData = $this->getData('style_display') ?? '';
        return $styleData != '' ? $styleData : $style;
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
