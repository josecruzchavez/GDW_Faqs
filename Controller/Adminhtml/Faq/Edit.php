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
            $this->messageManager->addErrorMessage(__('FAQ Id not found'));
            return $rRedirect->setPath('*/grid/faq/');
        } else {
            if (!is_scalar($dataId) || !is_numeric((string) $dataId)) {
                $this->messageManager->addErrorMessage(__('Invalid FAQ Id'));
                return $rRedirect->setPath('*/grid/faq/');
            }
            $faqTitle = $this->faqRepository->getById((int) $dataId)->getFaq();
            $faqTitleString = is_scalar($faqTitle) ? (string) $faqTitle : 'Edit';
            $resultPage->getConfig()->getTitle()->prepend(
                $faqTitleString
            );
        }
        return $resultPage;
    }
}
