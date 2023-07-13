<?php

namespace GDW\Faqs\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

    protected $_idFieldName = 'id';
    protected $_eventObject = 'faqs_faq_collection';
    protected $_eventPrefix = 'gdw_faqs_faq_collection';

    protected function _construct()
    {
        $this->_init(\GDW\Faqs\Model\Faq::class, \GDW\Faqs\Model\ResourceModel\Faq::class);
    }

    protected function _initSelect()
    {
        parent::_initSelect();

        $this->getSelect()->joinLeft(
                ['secondTable' => $this->getTable('catalog_product_entity')],
                'main_table.product_id = secondTable.entity_id',
                ['product_sku' => 'sku']
        );
        $this->getSelect()->joinLeft(
                ['threeTable' => $this->getTable('gdw_faqs_category')],
                'main_table.category_faq_id = threeTable.category_id',
                ['category_faq_name' => 'name']
        );
        $this->addFilterToMap('product_sku', 'secondTable.sku');
        $this->addFilterToMap('category_faq_name', 'threeTable.name');
    }
}
