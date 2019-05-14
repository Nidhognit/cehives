<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Tests\Model\Factory;


use Cehevis\Entity\Game;
use Cehevis\Model\Factory\GameViewFactory;
use Cehevis\Tests\Model\Factory\Fixtrures\GameViewFactoryFixture;
use Cehevis\Tests\TestTools\TestCases\DbTestCase;

class GameViewFactoryTest extends DbTestCase
{
    public function getFixtures(): array
    {
        return [GameViewFactoryFixture::class];
    }

    public function testEmptyMap(): void
    {
        $factory = $this->getGameViewFactory();
        $game = $this->em->find(Game::class, 2);

        $gameView = $factory->create($game);
        self::assertJson(json_encode($gameView));
    }

    public function testWithMap(): void
    {
        $factory = $this->getGameViewFactory();
        $game = $this->em->find(Game::class, 1);

        $gameView = $factory->create($game);
        self::assertJson(json_encode($gameView));
    }

    protected function getGameViewFactory(): GameViewFactory
    {
        return self::$container->get(GameViewFactory::class);
    }
}