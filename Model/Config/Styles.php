<?php
namespace GDW\Faqs\Model\Config;

class Styles implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => __('Without Style')], 
            ['value' => 1, 'label' => __('Simple')],
            ['value' => 2, 'label' => __('Accordion')]
        ];
    }

     public function toArray()
    {
        return [
            0 => __('Without Style'),
            1 => __('Simple'),
            2 => __('Accordion')
        ];
    }
}
