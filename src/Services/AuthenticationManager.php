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
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AuthenticationManager
{
    /** @var UserManagerInterface */
    private $userManager;

    /**@var LoginManagerInterface */
    private $loginManager;

    /** @var EncoderFactoryInterface */
    private $encoderFactory;

    private $firewallName = 'main';

    /**
     * AuthenticationManager constructor.
     * @param UserManagerInterface $userManager
     * @param LoginManagerInterface $loginManager
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(UserManagerInterface $userManager, LoginManagerInterface $loginManager, EncoderFactoryInterface $encoderFactory)
    {
        $this->userManager = $userManager;
        $this->loginManager = $loginManager;
        $this->encoderFactory = $encoderFactory;
    }


    public function login(User $user): void
    {
        $this->loginManager->logInUser($this->firewallName, $user);
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