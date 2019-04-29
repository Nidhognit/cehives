<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Controller;

use Cehevis\Manager\GameSandboxManager;
use Cehevis\Model\Factory\GameViewFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class Mai
 * @package Cehevis\Controller
 */
class GameController extends MainController
{
    /** @var GameSandboxManager
    protected $gameSandboxManager;
    /** @var GameViewFactory */
    protected $gameViewFactory;


    public function __construct(GameSandboxManager $gameSandboxManager, GameViewFactory $gameViewFactory)
    {
        $this->gameSandboxManager = $gameSandboxManager;
        $this->gameViewFactory = $gameViewFactory;
    }


    /**
     * @Route("/play/{id_hash}", name="gameplay")
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Response
     */
    public function gameAction(Request $request, string $id_hash)
    {
        $game = $this->gameSandboxManager->findOneByIdHashAndUser($id_hash, $this->getUser());
        if (null === $game) {
            throw $this->createNotFoundException();
        }
        $gameView = $this->gameViewFactory->create($game);

        return $this->render('game/game.html.twig', [
            'gameView' => $gameView,
            'game' => $game
        ]);
    }
}