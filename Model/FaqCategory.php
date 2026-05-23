<?php

namespace GDW\Faqs\Model;

use Magento\Framework\Model\AbstractModel;
use GDW\Faqs\Api\Data\FaqCategoryInterface;
use Magento\Framework\DataObject\IdentityInterface;

class FaqCategory extends AbstractModel implements FaqCategoryInterface, IdentityInterface
{
    const CACHE_TAG = 'gdw_faqs_faqcategory';
    /** @var string */
    protected $_cacheTag = 'gdw_faqs_faqcategory';
    protected $_eventPrefix = 'gdw_faqs_faqcategory';

    public function _construct()
    {
        $this->_init(\GDW\Faqs\Model\ResourceModel\FaqCategory::class);
    }

    /* Heredada de AbstractModel */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getCategoryId()];
    }

    /* Heredada de AbstractModel */
    /** @return array<string, mixed> */
    public function getDefaultValues(): array
	{
		$values = [];
		return $values;
	}

    /******* FaqCategoryInterface  *************/

    public function getCategoryId(): mixed
    {
        return $this->getData(self::CATEGORY_ID);
    }

    public function setCategoryId(mixed $category_id): FaqCategoryInterface
    {
        return $this->setData(self::CATEGORY_ID, $category_id);
    }

    public function getName(): mixed
    {
        return $this->getData(self::NAME);
    }

    public function setName(mixed $name): FaqCategoryInterface
    {
        return $this->setData(self::NAME, $name);
    }

    public function getCategoryStatus(): mixed
    {
        return $this->getData(self::CATEGORY_STATUS);
    }

    public function setCategoryStatus(mixed $category_status): FaqCategoryInterface
    {
        return $this->setData(self::CATEGORY_STATUS, $category_status);
    }

    /******* Custom Functions  *********/

    public function getById(mixed $category_id): self
    {
        if (!is_scalar($category_id) || !is_numeric((string) $category_id)) {
            return $this;
        }

        return $this->load((int) $category_id);
    }

}
