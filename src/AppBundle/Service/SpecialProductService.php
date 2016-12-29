<?php
namespace AppBundle\Service;

use AppBundle\Entity\SpecialProduct;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SpecialProductService
{
    /**
     * @var Registry
     */
    private $registry;
    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Gets all SpecialProducts
     *
     * @return array
     */
    public function getAllSpecialProducts() : array
    {
        $repository = $this->registry->getRepository('AppBundle\Entity\SpecialProduct');
        return $repository->findAll();
    }

    /**
     * Gets a SpecialProduct
     *
     * @param $id
     * @return SpecialProduct
     */
    public function getSpecialProduct($id) : SpecialProduct
    {
        $repository = $this->registry->getRepository('AppBundle\Entity\SpecialProduct');
        $ticket = $repository->findOneById($id);
        if (!$ticket) {
            throw new NotFoundHttpException(
                'SpecialProduct '.$id.' has not been found'
            );
        }
        return $ticket;
    }
}