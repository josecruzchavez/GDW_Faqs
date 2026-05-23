<?php
namespace GDW\Faqs\Ui\DataProvider\Product\Form\Modifier;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Session\Generic as BackendModelSession;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;

class FaqsFieldset extends AbstractModifier
{
    protected BackendModelSession $backSession;
    /** @var array<string, mixed> */
    protected array $meta = [];
    protected Http $request;

    public function __construct(
        BackendModelSession $backSession,
        Http $request
    ) {
        $this->backSession = $backSession;
        $this->request = $request;
    }
    
       
    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function modifyData(array $data): array
    {
        return $data;
    }
    
       
    /**
     * @param array<string, mixed> $meta
     * @return array<string, mixed>
     */
    public function modifyMeta(array $meta): array
    {
        $this->meta = $meta;
        $this->backSession->setCurrentProductIdByFaqs($this->request->getParam('id'));
        return $this->meta;
    }
}