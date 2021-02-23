<?php
namespace Neatline\Authentication\Adapter;

use Doctrine\ORM\EntityRepository;
use Interop\Container\ContainerInterface;
use Neatline\Authentication\JwtUtils;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Result;

/**
 * Auth adapter for JWT credentials.
 */
class JwtAdapter extends AbstractAdapter
{
    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var ContainerInterface
     */
    protected $serviceLocator;

    protected $user_id;
    protected $token;

    /**
     * Create the adapter.
     *
     * @param EntityRepository $repository The User repository.
     * @param ContainerInterface $serviceLocator The service locator.
     */
    public function __construct(EntityRepository $repository, ContainerInterface $serviceLocator)
    {
        $this->setRepository($repository);
        $this->setServiceLocator($serviceLocator);
    }

    /**
     * {@inheritDoc}
     */
    public function authenticate()
    {
        $user_id = $this->getUserId();
        $token = $this->getToken();

        if (!$user_id) {
            return new Result(Result::FAILURE_IDENTITY_NOT_FOUND, null,
                ['User not found.']);
        }

        if (!$token) {
            return new Result(Result::FAILURE_IDENTITY_NOT_FOUND, null,
                ['Invalid token.']);
        }

        $user = $this->repository->find($user_id);

        if (!$user || !$user->isActive() || !$user->getToken() == $token) {
            return new Result(Result::FAILURE_IDENTITY_NOT_FOUND, null,
                ['User not found.']);
        }

        return new Result(Result::SUCCESS, $user);
    }

    /**
     * Set the repository to use to look up users.
     *
     * @param EntityRepository $repository
     */
    public function setRepository(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get the repository used to look up users.
     *
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Set the service locator used to interface with Omeka global settings.
     *
     * @param ContainerInterface $serviceLocator
     */
    public function setServiceLocator($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Get the service locator used to interface with Omeka global settings.
     *
     * @return ContainerInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * Set the user ID.
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Sets the token.
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get the user ID.
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the token.
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * The JWT to be decoded for user identification.
     */
    public function setJwt($jwt)
    {
        $decoded = JwtUtils::decode($this->getServiceLocator(), $jwt);

        $this->setUserId($decoded->user_id);
        $this->setToken($decoded->token);
    }
}
