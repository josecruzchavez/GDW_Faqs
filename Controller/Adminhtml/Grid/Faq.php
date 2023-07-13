<?php
namespace GDW\Faqs\Controller\Adminhtml\Grid;

class Faq extends \Magento\Backend\App\Action
{
    protected $pageFactory;
    protected $faqFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \GDW\Faqs\Model\FaqFactory $faqFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->faqFactory = $faqFactory;
        return parent::__construct($context);
    }

    public function execute()
    {        
        $resultPage = $this->pageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Faqs Items')));
		return $resultPage;
    }
}
