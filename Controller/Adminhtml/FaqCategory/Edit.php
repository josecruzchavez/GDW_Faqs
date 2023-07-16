<?php

namespace GDW\Faqs\Controller\Adminhtml\FaqCategory;

class Edit extends \GDW\Faqs\Controller\Adminhtml\FaqCategory\AbstractData
{
    public function execute()
    {
        $dataId = $this->getRequest()->getParam('category_id');
        $resultPage = $this->resultPageFactory->create();
        $rRedirect = $this->resultRedirectFactory->create();

        if ($dataId === null) {
            $this->messageManager->addErrorMessage(__('FAQ Category Id not found'));
            return $rRedirect->setPath('*/grid/category/');
        } else {
            $resultPage->addBreadcrumb(__('Edit Data'), __('Edit Data'));
            $resultPage->getConfig()->getTitle()->prepend(_('Edit'));
        }
        return $resultPage;
    }
}
