<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\SpecialProduct;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadSpecialProductData implements FixtureInterface
{
    const NUMBER_OF_SpecialProductS = 10;

    /**
     * Loads fixtures
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $category = $this->createCategory($manager);

        for ($i = 1; $i <= self::NUMBER_OF_SpecialProductS; $i++) {
            $SpecialProduct = new SpecialProduct();
            $SpecialProduct->setName('special product ' . $i);
            $SpecialProduct->setCategory($category);

            $manager->persist($SpecialProduct);
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
        $category->setName('category 2');
        $manager->persist($category);

        return $category;
    }
}
