<?php
namespace GDW\Faqs\Model\Config;

class Tab
{
    public function getTabs()
    {
        return [
            'tab-faqs'  =>  [
                'title'         =>  'Faqs',
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
