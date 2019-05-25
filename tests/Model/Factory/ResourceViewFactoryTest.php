<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Tests\Model\Factory;

use Cehevis\Entity\Game;
use Cehevis\Model\Descriptors\BlockDescriptorInterface;
use Cehevis\Model\Factory\MapViewFactory;
use Cehevis\Model\Factory\ResourceViewFactory;
use Cehevis\Tests\Model\Factory\Fixtrures\MapViewFactoryFixture;
use Cehevis\Tests\Model\Factory\Fixtrures\ResourceViewFactoryFixture;
use Cehevis\Tests\TestTools\TestCases\DbTestCase;

class ResourceViewFactoryTest extends DbTestCase
{
    public function getFixtures(): array
    {
        return [ResourceViewFactoryFixture::class];
    }

    public function testWithMap(): void
    {
        /** @var Game $game */
        $game = $this->em->getRepository(Game::class)->find(1);
        $factory = $this->getResourceViewFactory();

        $resourceView = $factory->create($game->getResourceList(), $game->getResourceMap());
        self::assertJson(json_encode($resourceView));
        self::assertNotEmpty($resourceView->getDescriptorList());
        self::assertCount(3, $resourceView->getDescriptorList());
    }

    public function testWithNotUniqList(): void
    {
        /** @var Game $game */
        $game = $this->em->getRepository(Game::class)->find(1);
        $factory = $this->getResourceViewFactory();

        $resourceView = $factory->create($game->getResourceList(), $game->getResourceMap());
        self::assertJson(json_encode($resourceView));
        self::assertNotEmpty($resourceView->getDescriptorList());
        self::assertCount(3, $resourceView->getDescriptorList());
    }

    protected function getResourceViewFactory(): ResourceViewFactory
    {
        return self::$container->get(ResourceViewFactory::class);
    }
}