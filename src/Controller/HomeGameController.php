<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Controller;

use Cehevis\Forms\Main\DeleteType;
use Cehevis\Forms\MainGame\NewGameType;
use Cehevis\Manager\GameSandboxManager;
use Cehevis\Manager\MapTemplateManager;
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
 * @package Cehevis\Controller
 */
class HomeGameController extends MainController
{
    public const GAME_LIMIT = 3;
    /** @var GameSandboxManager */
    protected $gameSandboxManager;
    /** @var MapTemplateManager */
    protected $mapTemplateManager;
    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(GameSandboxManager $gameSandboxManager, MapTemplateManager $mapTemplateManager, TranslatorInterface $translator)
    {
        $this->gameSandboxManager = $gameSandboxManager;
        $this->mapTemplateManager = $mapTemplateManager;
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
            $mapTemplate = $this->mapTemplateManager->find($form->get('map_template')->getData());
            $game = $this->gameSandboxManager->createNewGame($user, $form->get('name')->getData(), $mapTemplate);

            return $this->redirectToRoute('gameplay', ['id_hash' => $game->getIdHash()]);
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
            'action' => $this->generateUrl('gamelist'),
            'mapList' => $this->mapTemplateManager->findAll()
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