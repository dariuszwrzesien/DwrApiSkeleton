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

    /**
     * @return ProductService
     */
    public function getProductService()
    {
        return $this->get('product.service');
    }

    /**
     * @return SpecialProductService
     */
    public function getSpecialProductService()
    {
        return $this->get('special_product.service');
    }
}
