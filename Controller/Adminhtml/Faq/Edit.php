<?php

namespace GDW\Faqs\Controller\Adminhtml\Faq;

class Edit extends \GDW\Faqs\Controller\Adminhtml\Faq\AbstractData
{
    public function execute()
    {
        $dataId = $this->getRequest()->getParam('id');
        $resultPage = $this->resultPageFactory->create();
        $rRedirect = $this->resultRedirectFactory->create();

        if ($dataId === null) {
            $this->messageManager->addErrorMessage(__('No se encontró el Id de la pregunta'));
            return $rRedirect->setPath('*/grid/faq/');
        } else {
            $resultPage->addBreadcrumb(__('Edit Data'), __('Edit Data'));
            $resultPage->getConfig()->getTitle()->prepend(
                $this->faqRepository->getById($dataId)->getFaq()
            );
        }
        return $resultPage;
    }
}
