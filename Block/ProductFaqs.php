<?php
namespace GDW\Faqs\Block;

use GDW\Core\Helper\Data as GdwHelper;
use GDW\Faqs\Helper\Data as FaqsHelper;
use GDW\Faqs\Model\ResourceModel\Faq\Collection;
use Magento\Framework\View\Element\Template\Context;

class ProductFaqs extends \Magento\Framework\View\Element\Template
{
    protected FaqsHelper $faqsHelper;
    protected GdwHelper $gdwHelper;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(
        Context $context,
        FaqsHelper $faqsHelper,
        GdwHelper $gdwHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->faqsHelper = $faqsHelper;
        $this->gdwHelper = $gdwHelper;
    }

    public function hasFaqs(): bool
    {
        return $this->faqsHelper->hasFaqsCurrentProduct();
    }

    public function getFaqs(): ?Collection
    {
        return $this->faqsHelper->getFaqsCurrentProduct();
    }

    public function getHtmlVal(mixed $val): string
    {
        return $this->faqsHelper->getHtmlVal($val);
    }

    public function getStyle(): string
    {
        $styleString = 'style_none';
        $style = $this->gdwHelper->getConfigValue('gdw/catalog_faqs/tab_style') ?? 0;
        if ($style == 1) {
            $styleString = 'style_simple';
        } elseif ($style == 2) {
            $styleString = 'style_accordion';
        }
        return $styleString;
    }
}
