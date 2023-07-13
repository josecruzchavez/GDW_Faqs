<?php

namespace GDW\Faqs\Model\ResourceModel\FaqCategory;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

    protected $_idFieldName = 'category_id';
    protected $_eventPrefix = 'gdw_faqs_category_collection';
    protected $_eventObject = 'faqs_category_collection';

    protected function _construct()
    {
        $this->_init(\GDW\Faqs\Model\FaqCategory::class, \GDW\Faqs\Model\ResourceModel\FaqCategory::class);
    }
}
