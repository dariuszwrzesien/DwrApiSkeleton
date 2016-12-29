<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\View;

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
     * @View(serializerGroups={"details"})
     *
     * @return array
     */
    public function getCategoriesAction()
    {
        return $this->getCategoryService()->getAllCategories();
    }
}