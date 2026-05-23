<?php

namespace GDW\Faqs\Api\Data;

interface FaqInterface
{
    const ID = 'id';
    const FAQ = 'faq';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const ORDER = 'order';
    const IDENT = 'ident';
    const PRODUCT_ID = 'product_id';
    const CATEGORY_FAQ_ID = 'category_faq_id';

    public function getId(): mixed;

    public function setId(mixed $id): FaqInterface;

    public function getFaq(): mixed;

    public function setFaq(mixed $faq): FaqInterface;

    public function getAnswer(): mixed;

    public function setAnswer(mixed $answer): FaqInterface;

    public function getStatus(): mixed;

    public function setStatus(mixed $status): FaqInterface;

    public function getOrder(): mixed;

    public function setOrder(mixed $order): FaqInterface;

    public function getIdent(): mixed;

    public function setIdent(mixed $ident): FaqInterface;

    public function getProductId(): mixed;

    public function setProductId(mixed $productId): FaqInterface;

    public function getCategoryFaqId(): mixed;

    public function setCategoryFaqId(mixed $categoryFaqId): FaqInterface;
}
