<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Forms\LoginType;
use App\Forms\RegistrationType;
use App\Services\AuthenticationManager;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /** @var AuthenticationManager */
    private $authenticationManager;


    public function __construct(AuthenticationManager $authenticationManager)
    {
        $this->authenticationManager = $authenticationManager;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrationAction(Request $request)
    {
        $user = $this->authenticationManager->createNew();

        $form = $this->getRegistrationForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setEnabled(true);
            $this->authenticationManager->createAndSaveUser($user);
            return $this->redirectToRoute('login');
        }

        return $this->render('main/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $form = $this->getLoginForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $usernameOrEmail = $form->get('_username')->getData();
            $user = $this->authenticationManager->findUserByUsernameOrEmail($usernameOrEmail);

            if($user instanceof User ){
                $password = $form->get('_password')->getData();
                if($this->authenticationManager->checkPasword($user, $password)){
                    $this->authenticationManager->login($user);
                    return $this->redirectToRoute('homepage');
                }

            }

            $form->addError(new FormError('Некорректное имя пользователя или пароль'));
        }

        return $this->render('main/login.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function logoutAction()
    {

    }

    /**
     * @param User $user
     * @return FormInterface
     */
    private function getRegistrationForm(User $user): FormInterface
    {
        return $this->createForm(RegistrationType::class, $user, [
            'method' => 'POST',
            'action' => $this->generateUrl('registration')
        ]);
    }

    /**
     * @return FormInterface
     */
    private function getLoginForm(): FormInterface
    {
        return $this->createForm(LoginType::class, null, [
            'method' => 'POST',
            'action' => $this->generateUrl('login')
        ]);
    }
}