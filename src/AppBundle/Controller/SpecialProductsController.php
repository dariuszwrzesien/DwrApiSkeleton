<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SpecialProduct;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SpecialProductsController extends ApiController
{
    /**
     * @ApiDoc(
     *   description = "Get all SpecialProducts",
     *   output = "AppBundle\Entity\SpecialProduct",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *   }
     * )
     *
     * @Rest\View()
     *
     * @return array
     */
    public function getSpecialproductsAction() : array
    {
        return $this->getSpecialProductService()->getAllSpecialProducts();
    }

    /**
     * @ApiDoc(
     *   description = "Get a SpecialProduct",
     *   requirements = {
     *     { "name" = "id", "dataType" = "integer", "requirement" = "\d+", "description" = "SpecialProduct's id" },
     *   },
     *   output = "AppBundle\Entity\SpecialProduct",
     *   statusCodes = {
     *     200 = "Returned when SpecialProduct was found",
     *     404 = "Returned when SpecialProduct was not found"
     *   }
     * )
     *
     * @Rest\View()
     *
     * @param $id
     * @return SpecialProduct
     */
    public function getSpecialproductAction($id) : SpecialProduct
    {
        throw $this->createNotFoundException(
            'No ticket found for id '.$id
        );
        return $this->getSpecialProductService()->getSpecialProduct($id);
    }
}
