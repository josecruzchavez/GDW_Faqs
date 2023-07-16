<?php
namespace GDW\Faqs\Controller\Adminhtml\Faq;

class Delete extends \GDW\Faqs\Controller\Adminhtml\Faq\AbstractData
{
    const ADMIN_RESOURCE = 'GDW_Faqs::delete';

    public function execute()
    {
        $rRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        if(isset($data['id'])){
            try {
                $newData = $this->faqRepository->load($data['id']);
                $newData->delete();
                $this->messageManager->addSuccessMessage(__('The FAQ was correctly deleted'));
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('An error occurred'));
            }
            return $rRedirect->setPath('*/grid/faq/');
        }else{
            $this->messageManager->addErrorMessage(__('FAQ Id not found'));
            return $rRedirect->setPath('*/grid/faq/');
        }
        
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
