<?php

namespace GDW\Faqs\Block\Adminhtml\FaqButtons;

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

    public function getFaqId(): int|string|null
    {
        try {
            $faqId = $this->context->getRequest()->getParam('id');
            return (is_int($faqId) || is_string($faqId)) ? $faqId : null;
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
