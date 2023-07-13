<?php
namespace GDW\Faqs\Controller\Adminhtml\FaqCategory;

class Save extends \GDW\Faqs\Controller\Adminhtml\FaqCategory\AbstractData
{
    const ADMIN_RESOURCE = 'GDW_Faqs::save';

    public function execute()
    {
        $rRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();

        if(isset($data['type_action']) && $data['type_action'] == 'new_category'){
            $newItem = $this->faqCategoryFactory->create();
            $newItem->setData($data);
            $newItem->save();
            if($newItem){
                $this->messageManager->addSuccessMessage(__('The category was saved successfully'));
                return $rRedirect->setPath('*/*/edit', ['category_id' => $newItem->getCategoryId(), '_current' => true]);
            }else{
                $this->messageManager->addException($e, __('An error has occurred'));
                return $rRedirect->setPath('*/*/create', ['_current' => true]);
            }
        }

        if(isset($data['category_id'])){
            try {               
                $newData = $this->faqCategoryRepository->load($data['category_id']);
                $newData->setData($data);
                $newData->save();
                $this->messageManager->addSuccessMessage(__('The category was successfully updated'));
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('An error has occurred'));
            }
            return $rRedirect->setPath('*/*/edit', ['category_id' => $data['category_id'], '_current' => true]);
        }else{
            $this->messageManager->addErrorMessage(__('Category Id not found'));
            return $rRedirect->setPath('*/grid/category');
        }

        return $rRedirect->setPath('*/*/create', ['_current' => true]);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
