<?php
namespace GDW\Faqs\Controller\Adminhtml\FaqCategory;

class Delete extends \GDW\Faqs\Controller\Adminhtml\FaqCategory\AbstractData
{
    const ADMIN_RESOURCE = 'GDW_Faqs::delete';

    public function execute()
    {
        $rRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        if(isset($data['category_id'])){
            try {
                $newData = $this->faqCategoryRepository->load($data['category_id']);
                $newData->delete();
                $this->messageManager->addSuccessMessage(__('La categoría se eliminó correctamente'));
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Ocurrió un error'));
            }
            return $rRedirect->setPath('*/grid/category');
        }else{
            $this->messageManager->addErrorMessage(__('No se encontró el Id de la categoría'));
            return $rRedirect->setPath('*/grid/category');
        }
        
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
