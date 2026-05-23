<?php
namespace GDW\Faqs\Controller\Adminhtml\Grid;

use GDW\Faqs\Model\FaqCategoryFactory;
use GDW\Faqs\Model\FaqFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Category extends Action
{
    protected PageFactory $pageFactory;
    protected FaqCategoryFactory $faqCategoryFactory;
    protected FaqFactory $faqFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        FaqCategoryFactory $faqCategoryFactory,
        FaqFactory $faqFactory
    )
    {
        $this->faqCategoryFactory = $faqCategoryFactory;
        $this->pageFactory = $pageFactory;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('FAQ Category')));
        return $resultPage;
    }
}
