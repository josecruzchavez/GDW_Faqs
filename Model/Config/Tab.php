<?php
namespace GDW\Faqs\Model\Config;

class Tab
{
    /**
     * @return array<string, array<string, mixed>>
     */
    public function getTabs(): array
    {
        return [
            'tab-faqs'  =>  [
                'title'         =>  'FAQs',
                'type'          =>  'template',
                'data'          =>  [
                    "type"      =>  "GDW\Faqs\Block\ProductFaqs",
                    "name"      =>  "gdw.faqs.view.productfaqs",
                    "template"  =>  "GDW_Faqs::tab/faqs.phtml"
                ],
                'description'   =>  '',
                'sortOrder'     =>  45
            ]
        ];
    }
}
