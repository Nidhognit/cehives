<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace App\Controller;

use App\Forms\Main\DeleteType;
use App\Forms\MainGame\NewGameType;
use App\Services\GameManager\GameSandboxManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class MainGameController
 * @Route("/game")
 * @package App\Controller
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
    public function gameAction(Request $request, $id)
    {
        return $this->render('game/game.html.twig', [
            'game' => $id,

        ]);
    }
}