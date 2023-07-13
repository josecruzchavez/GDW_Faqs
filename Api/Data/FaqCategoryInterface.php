<?php

namespace GDW\Faqs\Api\Data;

interface FaqCategoryInterface
{
    const CATEGORY_ID = 'category_id';
    const NAME = 'name';
    const CATEGORY_STATUS = 'category_Status';

    public function getCategoryId();

    public function setCategoryId($category_id);

    public function getName();

    public function setName($name);

    public function getCategoryStatus();

    public function setCategoryStatus($category_Status);
}
