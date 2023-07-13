<?php

namespace GDW\Faqs\Model\ResourceModel;

class FaqCategory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
    }

    public function _construct()
    {
        $this->_init('gdw_faqs_category','category_id');
    }
}
