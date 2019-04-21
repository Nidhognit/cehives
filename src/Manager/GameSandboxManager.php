<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Manager;

use Cehevis\Entity\Game;
use Cehevis\Entity\MapTemplate;
use Cehevis\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class GameSandboxManager extends AbstractEntityManager
{
    public const GAME_LIMIT = 3;

    public function getEntityClass(): string
    {
        return Game::class;
    }

    /**
     * GameSandboxManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createNewGame(User $user, string $name, MapTemplate $mapTemplate): Game
    {
        $game = new Game();
        $game->setName($name);
        $game->setType(Game::TYPE_SANDBOX);
        $game->setDateCreated(new \DateTime());
        $game->setUserId($user->getId());
        $game->setOriginalMapId($mapTemplate->getId());
        $game->setMap($mapTemplate->getMap());

        $this->em->persist($game);
        $this->em->flush();

        return $game;
    }

    /**
     * @param User $user
     * @return Game[]
     */
    public function loadAllGames(User $user): array
    {
        return $this->gameList = $this->getRepository()
            ->findBy(['user_id' => $user->getId(), 'type' => Game::TYPE_SANDBOX]);
    }

    public function findOneByIdAndUser(int $id, User $user): ?Game
    {
        return $this->getRepository()
            ->findOneBy(['id' => $id, 'user_id' => $user->getId(), 'type' => Game::TYPE_SANDBOX]);
    }

    public function delete(Game $game, bool $flash = false)
    {
        $this->em->remove($game);
        if ($flash) {
            $this->em->flush();
        }
    }
}