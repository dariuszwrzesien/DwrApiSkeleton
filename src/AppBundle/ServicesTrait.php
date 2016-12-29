<?php

namespace AppBundle;

use AppBundle\Service\CategoryService;

trait ServicesTrait
{
    /**
     * @return CategoryService
     */
    public function getCategoryService()
    {
        return $this->get('category.service');
    }
}
