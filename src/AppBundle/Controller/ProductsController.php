<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends ApiController
{
    /**
     * @ApiDoc(
     *   description = "Get all Products",
     *   output = "AppBundle\Entity\Product",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *   }
     * )
     *
     * @Rest\View()
     *
     * @return array
     */
    public function getProductsAction() : array
    {
        return $this->getProductService()->getAllProducts();
    }

    /**
     * @ApiDoc(
     *   description = "Get a Product",
     *   requirements = {
     *     { "name" = "id", "dataType" = "integer", "requirement" = "\d+", "description" = "Product's id" },
     *   },
     *   output = "AppBundle\Entity\Product",
     *   statusCodes = {
     *     200 = "Returned when product was found",
     *     404 = "Returned when product was not found"
     *   }
     * )
     *
     * @Rest\View()
     *
     * @param $id
     * @return Product
     */
    public function getProductAction($id) : Product
    {
        throw $this->createNotFoundException(
            'No ticket found for id '.$id
        );
        return $this->getProductService()->getProduct($id);
    }
}
