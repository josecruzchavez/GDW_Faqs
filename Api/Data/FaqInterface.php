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

    public function getId();

    public function setId($id);

    public function getFaq();

    public function setFaq($faq);

    public function getAnswer();

    public function setAnswer($answer);

    public function getStatus();

    public function setStatus($status);

    public function getOrder();

    public function setOrder($order);

    public function getIdent();

    public function setIdent($ident);

    public function getProductId();

    public function setProductId($productId);

    public function getCategoryFaqId();

    public function setCategoryFaqId($categoryFaqId);
}
