<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadProductData implements FixtureInterface
{
    const NUMBER_OF_PRODUCTS = 10;

    /**
     * Loads fixtures
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $category = $this->createCategory($manager);

        for ($i = 0; $i < self::NUMBER_OF_PRODUCTS; $i++) {
            $product = new Product();
            $product->setName('product ' . $i);
            $product->setCategory($category);

            $manager->persist($product);
            $manager->flush();
        }
    }

    /**
     * @param ObjectManager $manager
     * @return Category
     */
    private function createCategory(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('category 1');
        $manager->persist($category);

        return $category;
    }
}
