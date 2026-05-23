<?php
namespace GDW\Faqs\Model;

use GDW\Faqs\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Faq extends AbstractModel implements FaqInterface, IdentityInterface
{
    const CACHE_TAG = 'gdw_faqs_faq';
    /** @var string */
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
    /** @return array<string, mixed> */
    public function getDefaultValues(): array
	{
		$values = [];
		return $values;
	}

    /******* FaqCategoryInterface  *************/

    public function getId(): mixed
    {
        return $this->getData(self::ID);
    }

    public function setId(mixed $id): FaqInterface
    {
        return $this->setData(self::ID, $id);
    }

    public function getFaq(): mixed
    {
        return $this->getData(self::FAQ);
    }

    public function setFaq(mixed $faq): FaqInterface
    {
        return $this->setData(self::FAQ, $faq);
    }

    public function getAnswer(): mixed
    {
        return $this->getData(self::ANSWER);
    }

    public function setAnswer(mixed $answer): FaqInterface
    {
        return $this->setData(self::ANSWER, $answer);
    }

    public function getStatus(): mixed
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus(mixed $status): FaqInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getOrder(): mixed
    {
        return $this->getData(self::ORDER);
    }

    public function setOrder(mixed $order): FaqInterface
    {
        return $this->setData(self::ORDER, $order);
    }

    public function getIdent(): mixed
    {
        return $this->getData(self::IDENT);
    }

    public function setIdent(mixed $ident): FaqInterface
    {
        return $this->setData(self::IDENT, $ident);
    }

    public function getProductId(): mixed
    {
        return $this->getData(self::PRODUCT_ID);
    }

    public function setProductId(mixed $productId): FaqInterface
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    public function getCategoryFaqId(): mixed
    {
        return $this->getData(self::CATEGORY_FAQ_ID);
    }

    public function setCategoryFaqId(mixed $categoryFaqId): FaqInterface
    {
        return $this->setData(self::CATEGORY_FAQ_ID, $categoryFaqId);
    }

    /******* Custom Functions  *********/

    public function getById(mixed $id): self
    {
        if (!is_scalar($id) || !is_numeric((string) $id)) {
            return $this;
        }

        return $this->load((int) $id);
    }
}
