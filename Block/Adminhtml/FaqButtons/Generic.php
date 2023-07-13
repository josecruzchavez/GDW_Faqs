<?php

namespace GDW\Faqs\Block\Adminhtml\FaqButtons;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

class Generic
{

    protected $context;

    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    public function getFaqId()
    {
        try {
            return $this->context->getRequest()->getParam('id');
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
