<?php

namespace GDW\Faqs\Controller\Adminhtml\Faq;

class Create extends \GDW\Faqs\Controller\Adminhtml\Faq\AbstractData
{
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Faqs Items New')));
        return $resultPage;
    }
}
