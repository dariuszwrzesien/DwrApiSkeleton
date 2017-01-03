<?php

namespace AppBundle\Security;

use AppBundle\Entity\ApiUser;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var ObjectRepository
     */
    private $apiUserRepository;

    /**
     * ApiKeyUserProvider constructor.
     * @param ObjectRepository $apiUserRepository
     */
    public function __construct(ObjectRepository $apiUserRepository)
    {
        $this->apiUserRepository = $apiUserRepository;
    }

    public function getUsernameForApiKey($apiKey)
    {
        $apiUser = $this->apiUserRepository->getOneByParam(['apiKey' => $apiKey]);
        if (null === $apiUser) {
            throw new BadCredentialsException();
        }
        return $apiUser->getUsername();
    }

    public function loadUserByUsername($username)
    {
        return $this->apiUserRepository->getOneByParam(['email' => $username]);
    }

    public function refreshUser(UserInterface $user)
    {
        // this is used for storing authentication in the session
        // but in this example, the token is sent in each request,
        // so authentication can be stateless. Throwing this exception
        // is proper to make things stateless
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}

