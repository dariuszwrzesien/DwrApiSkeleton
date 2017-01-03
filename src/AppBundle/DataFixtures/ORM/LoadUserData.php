<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ApiUser;
use AppBundle\Service\ApiKeyGenerator;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Loads fixtures
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $apiAnonymousUser = $this->createApiAnonymousUser();
        $manager->persist($apiAnonymousUser);

        $apiUser = $this->createApiUser();
        $manager->persist($apiUser);

        $manager->flush();
    }

    /**
     * @return ApiUser
     */
    private function createApiAnonymousUser() : ApiUser
    {
        $apiAnonymousUser = new ApiUser();
        $apiAnonymousUser->setEmail('anonymous@anonymous_dj8029h39.api');
        $apiAnonymousUser->setApiKey($this->container->getParameter('api_anonymous_token'));
        $apiAnonymousUser->setRoles(array('IS_AUTHENTICATED_ANONYMOUSLY'));
        $apiAnonymousUser->enable();

        return $apiAnonymousUser;
    }

    /**
     * @return ApiUser
     */
    private function createApiUser() : ApiUser
    {
        $apiUser = new ApiUser();
        $apiUser->setEmail('dariuszwrzesien+dwrApiSkeleton@gmail.com');
        $apiUser->setApiKey(ApiKeyGenerator::generate());
        $apiUser->setRoles(array('ROLE_API'));
        $apiUser->enable();

        return $apiUser;
    }
}
