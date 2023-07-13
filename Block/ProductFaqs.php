<?php
namespace GDW\Faqs\Block;

class ProductFaqs extends \Magento\Framework\View\Element\Template
{
    protected $faqsHelper;
    protected $gdwHelper;
    protected $context;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \GDW\Faqs\Helper\Data $faqsHelper,
        \GDW\Core\Helper\Data $gdwHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->faqsHelper = $faqsHelper;
        $this->gdwHelper = $gdwHelper;
    }

    public function hasFaqs()
    {
        return $this->faqsHelper->hasFaqsCurrentProduct();
    }

    public function getFaqs()
    {
        return $this->faqsHelper->getFaqsCurrentProduct();
    }

    public function getHtmlVal($val)
    {
        return $this->faqsHelper->getHtmlVal($val);
    }

    public function getStyle()
    {
        $styleString = 'style_none';
        $style = $this->gdwHelper->getConfigValue('gdw/catalog_faqs/tab_style') ?? 0;
        if($style == 1){
            $styleString = 'style_simple';
        }elseif($style == 2){
            $styleString = 'style_accordion';
        }
        return $styleString;
    }
}
