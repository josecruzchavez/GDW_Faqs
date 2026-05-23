<?php

namespace GDW\Faqs\Block\Adminhtml\FaqButtons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Back extends Generic implements ButtonProviderInterface
{
    /**
     * @return array<string, mixed>
     */
    public function getButtonData()
    {
        $data = [
            'label' => __('Back'),
            'class' => 'back',
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'sort_order' => 20,
        ];

        return $data;
    }

    public function getBackUrl(): string
    {
        return $this->getUrl('*/grid/faq', []);
    }
}

