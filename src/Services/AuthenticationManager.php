<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace App\Services;

use App\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Security\LoginManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class AuthenticationManager
{
    /** @var UserManagerInterface */
    private $userManager;

    /**@var LoginManagerInterface */
    private $loginManager;

    /** @var EncoderFactoryInterface */
    private $encoderFactory;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    private $firewallName = 'main';

    /**
     * AuthenticationManager constructor.
     * @param UserManagerInterface $userManager
     * @param LoginManagerInterface $loginManager
     * @param EncoderFactoryInterface $encoderFactory
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(UserManagerInterface $userManager, LoginManagerInterface $loginManager, EncoderFactoryInterface $encoderFactory, TokenStorageInterface $tokenStorage)
    {
        $this->userManager = $userManager;
        $this->loginManager = $loginManager;
        $this->encoderFactory = $encoderFactory;
        $this->tokenStorage = $tokenStorage;
    }


    public function login(User $user): void
    {
        $this->loginManager->logInUser($this->firewallName, $user);
    }

    public function logout(Request $request, $token)
    {
        $this->tokenStorage->removeToken($token);
        $request->getSession()->invalidate();
    }

    public function checkPasword(User $user, string $password)
    {
        $encoder = $this->encoderFactory->getEncoder($user);
        $hashedPassword = $encoder->encodePassword($password, $user->getSalt());

        return $hashedPassword === $user->getPassword();
    }

    public function createAndSaveUser(User $user)
    {
        $this->userManager->updateUser($user);
    }

    public function findUserByUsernameOrEmail(string $usernameOrEmail): User
    {
        return $this->userManager->findUserByUsernameOrEmail($usernameOrEmail);
    }

    public function createNew(): User
    {
        return $this->userManager->createUser();
    }
}