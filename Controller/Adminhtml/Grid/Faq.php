<?php
namespace GDW\Faqs\Controller\Adminhtml\Grid;

use GDW\Faqs\Model\FaqFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Faq extends Action
{
    protected PageFactory $pageFactory;
    protected FaqFactory $faqFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        FaqFactory $faqFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {        
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('FAQs Items')));
        return $resultPage;
    }
}
