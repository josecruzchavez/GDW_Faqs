<?php
namespace GDW\Faqs\Observer;

use GDW\Faqs\Helper\Data;
use Magento\Framework\Event\Observer;
use GDW\Core\Helper\Data as GdwHelper;
use GDW\Faqs\Model\Config\Tab as TabConfig;
use Magento\Framework\Event\ObserverInterface;
 
class Tab implements ObserverInterface
{
    const PARENT_BlOCK_NAME = 'product.info.details';
    const RENDERING_TEMPLATE = 'GDW_Faqs::tab/renderer.phtml';

    private $tabs;
    private $faqHelper;
    private $gdwHelper;
 
    public function __construct(
        Data $faqHelper,
        TabConfig $tabs,
        GdwHelper $gdwHelper
        )
    {
        $this->tabs = $tabs;
        $this->faqHelper = $faqHelper;
        $this->gdwHelper = $gdwHelper;
    }
 
    public function execute(Observer $observer)
    {
        $displayTab = $this->gdwHelper->getConfigValue('gdw/catalog_faqs/show_tab') ?? 0;
        if($displayTab){
            $hasFaqs = $this->faqHelper->hasFaqsCurrentProduct();
            if($hasFaqs){
                $layout = $observer->getLayout();
                $blocks = $layout->getAllBlocks();
                $titleTab = $this->gdwHelper->getConfigValue('gdw/catalog_faqs/tab_title') ?? '';
                foreach ($blocks as $key => $block) {
                    if ($block->getNameInLayout() == self::PARENT_BlOCK_NAME) {
                        foreach ($this->tabs->getTabs() as $key => $tab) {
                            $block->addChild($key,
                                \Magento\Catalog\Block\Product\View::class,
                                [
                                    'template' => self::RENDERING_TEMPLATE,
                                    'title'    => $titleTab != '' ? $titleTab : $tab['title'],
                                    'jsLayout' => [$tab]
                                ]
                            );
                        }
                    }
                }
            }
        }   
    }
}