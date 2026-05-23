<?php

namespace GDW\Faqs\Api\Data;

interface FaqCategoryInterface
{
    const CATEGORY_ID = 'category_id';
    const NAME = 'name';
    const CATEGORY_STATUS = 'category_Status';

    public function getCategoryId(): mixed;

    public function setCategoryId(mixed $category_id): FaqCategoryInterface;

    public function getName(): mixed;

    public function setName(mixed $name): FaqCategoryInterface;

    public function getCategoryStatus(): mixed;

    public function setCategoryStatus(mixed $category_Status): FaqCategoryInterface;
}
