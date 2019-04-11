<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace App\Controller;

use App\Forms\MainGame\NewGameType;
use App\Services\GameManager\GameSandboxManager;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainGameController
 * @Route("/game")
 * @package App\Controller
 */
class HomeGameController extends MainController
{
    /** @var GameSandboxManager */
    protected $gameSandboxManager;

    /**
     * MainGameController constructor.
     * @param GameSandboxManager $gameSandboxManager
     */
    public function __construct(GameSandboxManager $gameSandboxManager)
    {
        $this->gameSandboxManager = $gameSandboxManager;
    }

    /**
     * @Route("/list", name="gamelist")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function gameListAction(Request $request)
    {
        $user = $this->getUser();

        $form = $this->getNewGameForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $game = $this->gameSandboxManager->createNewGame($user, $form->get('name')->getData());

            return $this->redirectToRoute('gameplay', ['id' => $game->getId()]);
        }

        $gameList = $this->gameSandboxManager->loadAllGames($user);


        return $this->render('homeGame/gameList.html.twig', [
            'gameList' => $gameList,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/play/{id}", name="gameplay", requirements={"id": "\d+"})
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Response
     */
    public function gameAction(Request $request, $id)
    {
        return $this->render('homeGame/game.html.twig', [
            'game' => $id,

        ]);
    }

    public function getNewGameForm(): FormInterface
    {
        return $this->createForm(NewGameType::class, null, [
            'method' => 'POST',
            'action' => $this->generateUrl('gamelist')
        ]);
    }

}