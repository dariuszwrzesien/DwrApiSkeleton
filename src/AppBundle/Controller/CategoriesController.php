<?php

namespace AppBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

class CategoriesController extends ApiController
{
    /**
     * @ApiDoc(
     *   description = "Get all Categories",
     *   output = "AppBundle\Entity\Category",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *   }
     * )
     *
     * @Rest\View()
     *
     * @return array
     */
    public function getCategoriesAction()
    {
        return $this->getCategoryService()->getAllCategories();
    }
}
