<?php

namespace GDW\Faqs\Model;

use Magento\Framework\Model\AbstractModel;
use GDW\Faqs\Api\Data\FaqCategoryInterface;
use Magento\Framework\DataObject\IdentityInterface;

class FaqCategory extends AbstractModel implements FaqCategoryInterface, IdentityInterface
{
    const CACHE_TAG = 'gdw_faqs_faqcategory';
    protected $_cacheTag = 'gdw_faqs_faqcategory';
    protected $_eventPrefix = 'gdw_faqs_faqcategory';

    public function _construct()
    {
        $this->_init(\GDW\Faqs\Model\ResourceModel\FaqCategory::class);
    }

    /* Heredada de AbstractModel */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getIdCategory()];
    }

    /* Heredada de AbstractModel */
	public function getDefaultValues(): array
	{
		$values = [];
		return $values;
	}

    /******* FaqCategoryInterface  *************/

    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    public function setCategoryId($category_id)
    {
        return $this->setData(self::CATEGORY_ID, $category_id);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getCategoryStatus()
    {
        return $this->getData(self::CATEGORY_STATUS);
    }

    public function setCategoryStatus($category_status)
    {
        return $this->setData(self::CATEGORY_STATUS, $category_status);
    }

    /******* Custom Functions  *********/

    public function getById($category_id)
    {
        return $this->load($category_id);
    }

}
