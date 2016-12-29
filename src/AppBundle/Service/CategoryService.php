<?php
namespace AppBundle\Service;

use AppBundle\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Registry;

class CategoryService
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
     * Gets all categories
     *
     * @return array
     */
    public function getAllCategories() : array
    {
        $repository = $this->registry->getRepository('AppBundle\Entity\Category');
        return $repository->findAll();
    }
}