<?php
namespace GDW\Faqs\Controller\Adminhtml\FaqCategory;

use GDW\Faqs\Model\Faq;
use GDW\Faqs\Model\FaqFactory;
use GDW\Faqs\Model\FaqCategory;
use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use GDW\Faqs\Model\FaqCategoryFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;

abstract class AbstractData extends Action
{
    const ACTION_RESOURCE = 'GDW_Faqs::faqdata';

    protected $coreRegistry;
    protected $faqRepository;
    protected $resultPageFactory;
    protected $resultForwardFactory;
    protected $faqCategoryRepository;

    public function __construct(
        Registry $registry,
        Faq $faqRepository,
        FaqFactory $faqFactory,
        FaqCategory $faqCategoryRepository,
        FaqCategoryFactory $faqCategoryFactory,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Context $context
    ) {
        $this->coreRegistry         = $registry;
        $this->faqFactory           = $faqFactory;
        $this->faqRepository        = $faqRepository;
        $this->faqCategoryRepository = $faqCategoryRepository;
        $this->faqCategoryFactory   = $faqCategoryFactory;
        $this->resultPageFactory    = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
}
