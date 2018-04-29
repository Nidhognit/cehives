<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace App\Services\GameManager;

use App\Entity\Game;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class GameSandboxManager
{
    public const GAME_LIMIT = 3;

    /** @var EntityManagerInterface */
    protected $em;

    protected $gameList = [];

    /**
     * GameSandboxManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createNewGame(User $user, string $name): Game
    {
        $game = new Game();
        $game->setName($name);
        $game->setType(Game::TYPE_SANDBOX);
        $game->setDateCreated(new \DateTime());
        $game->setUserId($user->getId());

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
        if (empty($this->gameList)) {
            $this->gameList = $this->em->getRepository(Game::class)
                ->findBy(['user_id' => $user->getId(), 'type' => Game::TYPE_SANDBOX]);
        }

        return $this->gameList;
    }
}