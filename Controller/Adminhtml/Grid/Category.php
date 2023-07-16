<?php
namespace GDW\Faqs\Controller\Adminhtml\Grid;

class Category extends \Magento\Backend\App\Action
{
    protected $pageFactory;
    protected $faqCategoryFactory;
    protected $faqFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \GDW\Faqs\Model\FaqCategoryFactory $faqCategoryFactory,
        \GDW\Faqs\Model\FaqFactory $faqFactory
    )
    {
        $this->faqCategoryFactory = $faqCategoryFactory;
        $this->pageFactory = $pageFactory;
        $this->faqFactory = $faqFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('FAQ Category')));
		return $resultPage;
    }
}
