<?php

namespace GDW\Faqs\Block\Adminhtml\FaqCategoryButtons;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

class Generic
{
    protected Context $context;

    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    public function getFaqCategoryId(): int|string|null
    {
        try {
            $categoryId = $this->context->getRequest()->getParam('category_id');
            return (is_int($categoryId) || is_string($categoryId)) ? $categoryId : null;
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * @param array<string, mixed> $params
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
