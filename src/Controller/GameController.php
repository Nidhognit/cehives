<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Controller;

use Cehevis\Manager\GameSandboxManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class MainGameController
 * @Route("/game")
 * @package Cehevis\Controller
 */
class GameController extends MainController
{
    /** @var GameSandboxManager */
    protected $gameSandboxManager;

    public function __construct(GameSandboxManager $gameSandboxManager, TranslatorInterface $translator)
    {
        $this->gameSandboxManager = $gameSandboxManager;
    }


    /**
     * @Route("/play/{id}", name="gameplay", requirements={"id": "\d+"})
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Response
     */
    public function gameAction(Request $request, int $id)
    {
        $game = $this->gameSandboxManager->findOneByIdAndUser($id, $this->getUser());
        if (null === $game) {
            throw $this->createNotFoundException();
        }
        return $this->render('game/game.html.twig', [
            'game' => $game->getId(),

        ]);
    }
}