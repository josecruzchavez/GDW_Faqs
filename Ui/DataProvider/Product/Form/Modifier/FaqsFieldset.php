<?php
namespace GDW\Faqs\Ui\DataProvider\Product\Form\Modifier;

use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Container;
use GDW\Faqs\Helper\Data as FaqsHelper;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Framework\Stdlib\ArrayManager;
use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
    
class FaqsFieldset extends AbstractModifier
{
    const CUSTOM_FIELDSET_INDEX = 'custom_fieldset';
    const CONTAINER_HEADER_NAME = 'custom_fieldset_content_header';
    
    protected $locator;
    protected $meta = [];
    protected $faqsHelper;
    protected $urlBuilder;
    protected $arrayManager;

    public function __construct(
        FaqsHelper $faqsHelper,
        UrlInterface $urlBuilder,
        LocatorInterface $locator,
        ArrayManager $arrayManager        
    ) {
        $this->locator = $locator;
        $this->faqsHelper = $faqsHelper;
        $this->urlBuilder = $urlBuilder;
        $this->arrayManager = $arrayManager;   
    }
    
       
    public function modifyData(array $data)
    {
        return $data;
    }
    
       
    public function modifyMeta(array $meta)
    {
            $this->meta = $meta;
            $this->addCustomFieldset();
            return $this->meta;
    }
    
        
    protected function addCustomFieldset()
    {
        $this->meta = array_merge_recursive(
            $this->meta,
            [
                static::CUSTOM_FIELDSET_INDEX => $this->getFieldsetConfig(),
            ]
        );
    }
    
    protected function getFieldsetConfig()
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Product Faqs'),
                        'componentType' => Fieldset::NAME,
                        'dataScope' => static::DATA_SCOPE_PRODUCT,
                        'provider' => static::DATA_SCOPE_PRODUCT . '_data_source',
                        'ns' => static::FORM_NAME,
                        'collapsible' => true,
                        'sortOrder' => 80,
                        'opened' => false,
                    ],
                ],
            ],
            'children' => [
                static::CONTAINER_HEADER_NAME => $this->getHeaderContainerConfig(10)
            ],
        ];
    }
    
    protected function getHeaderContainerConfig($sortOrder)
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => null,
                        'formElement' => Container::NAME,
                        'componentType' => Container::NAME,
                        'template' => 'ui/form/components/complex',
                        'additionalClasses' => 'admin__fieldset-wrapper-content',
                        'sortOrder' => $sortOrder,
                        'content' => $this->renderFaqs(),
                    ],
                ],
            ],
            'children' => [],
        ];
    }
    

    public function renderFaqs()
    {
        $html = 'Without Faqs.';
        $hasFaqs = $this->faqsHelper->hasAllFaqsCurrentProduct();
        if($hasFaqs){
            $faqs = $this->faqsHelper->getAllFaqsCurrentProduct();
            $html = '<table class="data-grid"><thead><tr>';
            $html .= '<th class="data-grid-th"><span>Order</span></th>';
            $html .= '<th class="data-grid-th"><span>Faq</span></th>';
            $html .= '<th class="data-grid-th"><span>Status</span></th>';
            $html .= '</tr></thead><tbody>';
            $index = 0;
            foreach($faqs as $faq){
                $html .= '<tr class="data-row '.($index % 2 != 0 ? '_odd-row' : '').'">';
                $html .= '<td>'.$faq->getOrder().'</td>';
                $html .= '<td>'.$faq->getFaq().'</td>';
                $html .= '<td>'.($faq->getStatus() == 1 ? _('Enable') : _('Disable')).'</td>';
                $html .= '</tr>';
                ++$index;
            }
            $html .= '</tbody></table>';
            $html .= '<style>.admin__field-complex.admin__fieldset-wrapper-content .admin__field-complex-content{max-width:100% !important;} .admin__field-complex.admin__fieldset-wrapper-content{padding-left:0px !important;}</style>';
        }
        
        return $html;
    }
}