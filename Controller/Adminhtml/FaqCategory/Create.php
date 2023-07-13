<?php

namespace GDW\Faqs\Controller\Adminhtml\FaqCategory;

class Create extends \GDW\Faqs\Controller\Adminhtml\FaqCategory\AbstractData
{
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Category Faqs New')));
        return $resultPage;
    }
}
