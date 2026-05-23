<?php

namespace GDW\Faqs\Block\Adminhtml\FaqCategoryButtons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * @return array<string, mixed>
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getFaqCategoryId()) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to delete the category?'
                ) . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getDeleteUrl(): string
    {
        return $this->getUrl('*/*/delete', ['category_id' => $this->getFaqCategoryId()]);
    }
}

