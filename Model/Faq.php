<?php
namespace GDW\Faqs\Model;

use GDW\Faqs\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Faq extends AbstractModel implements FaqInterface, IdentityInterface
{
    const CACHE_TAG = 'gdw_faqs_faq';
    protected $_cacheTag = 'gdw_faqs_faq';
    protected $_eventPrefix = 'gdw_faqs_faq';

    public function _construct()
    {
        $this->_init(\GDW\Faqs\Model\ResourceModel\Faq::class);
    }

    /* Heredada de AbstractModel */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /* Heredada de AbstractModel */
	public function getDefaultValues(): array
	{
		$values = [];
		return $values;
	}

    /******* FaqCategoryInterface  *************/

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getFaq()
    {
        return $this->getData(self::FAQ);
    }

    public function setFaq($faq)
    {
        return $this->setData(self::FAQ, $faq);
    }

    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getOrder()
    {
        return $this->getData(self::ORDER);
    }

    public function setOrder($order)
    {
        return $this->setData(self::ORDER, $order);
    }

    public function getIdent()
    {
        return $this->getData(self::IDENT);
    }

    public function setIdent($ident)
    {
        return $this->setData(self::IDENT, $ident);
    }

    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    public function getCategoryFaqId()
    {
        return $this->getData(self::CATEGORY_FAQ_ID);
    }

    public function setCategoryFaqId($categoryFaqId)
    {
        return $this->setData(self::CATEGORY_FAQ_ID, $categoryFaqId);
    }

    /******* Custom Functions  *********/

    public function getById($id)
    {
        return $this->load($id);
    }

    public function getByProduct($product_id)
    {
        /**/
        return false;
    }
}
