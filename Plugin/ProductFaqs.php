<?php
namespace GDW\Faqs\Plugin;

use GDW\Faqs\Helper\Data;
use GDW\Core\Helper\Data as GdwHelper;
use GDW\Faqs\Model\Config\Tab as TabConfig;
use Magento\Catalog\Block\Product\View\Details;
 
class ProductFaqs
{
    private TabConfig $tabs;
    private Data $faqHelper;
    private GdwHelper $gdwHelper;
 
    public function __construct(
        TabConfig $tabs,
        Data $faqHelper,
        GdwHelper $gdwHelper
    ) {
        $this->tabs = $tabs;
        $this->faqHelper = $faqHelper;
        $this->gdwHelper = $gdwHelper;
    }
 
    /**
     * @param array<int|string, mixed> $result
     * @return array<int|string, mixed>
     */
    public function afterGetGroupSortedChildNames(Details $subject, array $result): array
    {
        $displayTab = $this->gdwHelper->getConfigValue('gdw/catalog_faqs/show_tab') ?? 0;
        if ($displayTab) {
            $hasFaqs = $this->faqHelper->hasFaqsCurrentProduct();
            if ($hasFaqs) {
                if (!empty($this->tabs->getTabs())) {
                    foreach ($this->tabs->getTabs() as $key => $tab) {
                        $sortOrder = isset($tab['sortOrder']) ? $tab['sortOrder'] : 45;
                        $result = array_merge($result, [ $sortOrder => 'product.info.details.' . $key]);
                    }
                }
            }
        }
        return $result;
    }
}