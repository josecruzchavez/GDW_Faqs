<?php

namespace GDW\Faqs\Block\Adminhtml\FaqButtons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Create extends Generic implements ButtonProviderInterface
{

    public function getButtonData()
    {
        $data = [
            'label' => __('New'),
            'class' => 'new action-secondary',
            'on_click' => sprintf("location.href = '%s';", $this->getNewUrl()),
            'sort_order' => 20,
        ];

        return $data;
    }

    public function getNewUrl()
    {
        return $this->getUrl('*/faq/create', []);
    }
}

