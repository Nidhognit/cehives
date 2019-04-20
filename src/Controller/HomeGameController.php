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
 * @Route("/home_game")
 * @package App\Controller
 */
class HomeGameController extends MainController
{
    public const GAME_LIMIT = 3;
    /** @var GameSandboxManager */
    protected $gameSandboxManager;
    /** @var TranslatorInterface */
    protected $translator;

    /**
     * MainGameController constructor.
     * @param GameSandboxManager $gameSandboxManager
     * @param TranslatorInterface $translator
     */
    public function __construct(GameSandboxManager $gameSandboxManager, TranslatorInterface $translator)
    {
        $this->gameSandboxManager = $gameSandboxManager;
        $this->translator = $translator;
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
        $gameList = $this->gameSandboxManager->loadAllGames($user);
        $isGameLimit = count($gameList) >= self::GAME_LIMIT;
        if (!$isGameLimit && $form->isSubmitted() && $form->isValid()) {
            $game = $this->gameSandboxManager->createNewGame($user, $form->get('name')->getData());

            return $this->redirectToRoute('gameplay', ['id' => $game->getId()]);
        }

        return $this->render('homeGame/gameList.html.twig', [
            'gameList' => $gameList,
            'form' => $form->createView(),
            'isGameLimit' => $isGameLimit,
            'deleteForm' => $this->getDeleteForm()->createView()
        ]);
    }

    /**
     * @Route("/delete", name="delete_game", requirements={"id": "\d+"})
     * @Method("POST")
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Response
     */
    public function gameDelete(Request $request)
    {
        $form = $this->getDeleteForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $game = $this->gameSandboxManager->findOneByIdAndUser($form->get('id')->getData(), $this->getUser());
            if ($game) {
                $this->gameSandboxManager->delete($game, true);
                $this->addSuccessMessage($this->translator->trans('translation@message.delete_seccess'));
            } else {
                $this->addErrorMessage($this->translator->trans('translation@message.access_denied'));
            }
        } else {
            $this->addErrorMessage($this->translator->trans('translation@message.unknown_error'));
        }


        return $this->redirectToRoute('gamelist');
    }

    public function getNewGameForm(): FormInterface
    {
        return $this->createForm(NewGameType::class, null, [
            'method' => 'POST',
            'action' => $this->generateUrl('gamelist')
        ]);
    }

    public function getDeleteForm(): FormInterface
    {
        return $this->createForm(DeleteType::class, null, [
            'method' => 'POST',
            'action' => $this->generateUrl('delete_game')
        ]);
    }
}