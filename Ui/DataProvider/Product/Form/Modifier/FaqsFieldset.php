<?php
namespace GDW\Faqs\Ui\DataProvider\Product\Form\Modifier;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Session\Generic as BackendModelSession;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;

class FaqsFieldset extends AbstractModifier
{
    protected $backSession;
    protected $meta = [];
    protected $request;

    public function __construct(
        BackendModelSession $backSession,
        Http $request
    ) {
        $this->backSession = $backSession;
        $this->request = $request;
    }
    
       
    public function modifyData(array $data)
    {
        return $data;
    }
    
       
    public function modifyMeta(array $meta)
    {
        $this->meta = $meta;
        $this->backSession->setCurrentProductIdByFaqs($this->request->getParam('id'));
        return $this->meta;
    }
}