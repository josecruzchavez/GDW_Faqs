<?php
namespace GDW\Faqs\Controller\Adminhtml\Faq;

class Save extends \GDW\Faqs\Controller\Adminhtml\Faq\AbstractData
{
    const ADMIN_RESOURCE = 'GDW_Faqs::save';

    public function execute()
    {
        $rRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();

        if(isset($data['type_action']) && $data['type_action'] == 'new_item'){
            if(!isset($data['ident'])){$data['ident'] = null;}
            if(!isset($data['product_id'])){$data['product_id'] = null;}
            if(!isset($data['category_faq_id'])){$data['category_faq_id'] = null;}
            $newItem = $this->faqFactory->create();
            $newItem->setData($data);
            $newItem->save();
            if($newItem){
                $this->messageManager->addSuccessMessage(__('The answer to the question was saved successfully'));
                return $rRedirect->setPath('*/*/edit', ['id' => $newItem->getId(), '_current' => true]);
            }else{
                $this->messageManager->addException($e, __('An error has occurred'));
                return $rRedirect->setPath('*/*/create', ['_current' => true]);
            }
        }

        if(isset($data['id'])){
            try {
                if(!isset($data['ident'])){$data['ident'] = null;}
                if(!isset($data['product_id'])){$data['product_id'] = null;}
                if(!isset($data['category_faq_id'])){$data['category_faq_id'] = null;}
                $newData = $this->faqRepository->load($data['id']);
                $newData->setData($data);
                $newData->save();
                $this->messageManager->addSuccessMessage(__('The answer to the question was successfully updated'));
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('An error has occurred'));
            }
            return $rRedirect->setPath('*/*/edit', ['id' => $data['id'], '_current' => true]);
        }else{
            $this->messageManager->addErrorMessage(__('Question Id not found'));
            return $rRedirect->setPath('*/grid/faq/');
        }

        return $rRedirect->setPath('*/*/create', ['_current' => true]);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
