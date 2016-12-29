<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class CategoriesController extends ApiController
{
    /**
     * @ApiDoc(
     *   description = "Get all Categories",
     *   output = "AppBundle\Entity\Category",
     *   statusCodes = {
     *     200 = "OK",
     *   }
     * )
     *
     * @Rest\View()
     *
     * @return array
     */
    public function getCategoriesAction() : array
    {
        return $this->getCategoryService()->getAllCategories();
    }
}
