<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Forms\RegistrationType;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /** @var UserManagerInterface */
    private $userManager;
    /** @var TokenStorageInterface */
    private $tokenStorage;


    public function __construct(UserManagerInterface $userManager, TokenStorageInterface $tokenStorage)
    {
        $this->userManager = $userManager;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homeAction()
    {
        return $this->render('main/main.html.twig', []);
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function registrationAction(Request $request)
    {
        $user = $this->userManager->createUser();
        $user->setEnabled(true);

        $form = $this->getRegistrationForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userManager->updateUser($user);
            return $this->redirectToRoute('login');
        }

        return $this->render('main/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {

    }

    public function logoutAction()
    {

    }

    /**
     * @param User $user
     * @return FormInterface
     */
    private function getRegistrationForm(User $user):FormInterface
    {
        return $this->createForm(RegistrationType::class, $user, [
            'method' => 'POST',
            'action' => $this->generateUrl('registration')
        ]);
    }
}