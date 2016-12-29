<?php
namespace AppBundle\Service;

use AppBundle\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductService
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
     * Gets all products
     *
     * @return array
     */
    public function getAllProducts() : array
    {
        $repository = $this->registry->getRepository('AppBundle\Entity\Product');
        return $repository->findAll();
    }

    /**
     * Gets a product
     *
     * @param $id
     * @return Product
     */
    public function getProduct($id) : Product
    {
        $repository = $this->registry->getRepository('AppBundle\Entity\Product');
        $ticket = $repository->findOneById($id);
        if (!$ticket) {
            throw new NotFoundHttpException(
                'Product '.$id.' has not been found'
            );
        }
        return $ticket;
    }
}