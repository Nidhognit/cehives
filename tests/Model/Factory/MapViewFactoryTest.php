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
use Cehevis\Tests\Model\Factory\Fixtrures\MapViewFactoryFixture;
use Cehevis\Tests\TestTools\TestCases\DbTestCase;

class MapViewFactoryTest extends DbTestCase
{
    public function getFixtures(): array
    {
        return [MapViewFactoryFixture::class];
    }

    public function testEmptyMap(): void
    {
        $factory = $this->getMapViewFactory();
        $mapView = $factory->create([], []);
        self::assertEmpty($mapView->getMap());
        self::assertEmpty($mapView->getViewDescriptor());
        self::assertJson(json_encode($mapView));
    }

    public function testWithMap(): void
    {
        $game = $this->em->getRepository(Game::class)->find(1);
        $factory = $this->getMapViewFactory();

        $mapView = $factory->create($game->getMap(), $game->getMapItems());
        self::assertJson(json_encode($mapView));

        self::assertNotEmpty($mapView->getMap());
        self::assertCount(16, $mapView->getMap());

        self::assertNotEmpty($mapView->getViewDescriptor());

        foreach ($mapView->getViewDescriptor() as $name => $descriptor) {
            self::assertInstanceOf(BlockDescriptorInterface::class, $descriptor);
            self::assertSame($name, $descriptor->getType());
            self::assertNotEmpty($descriptor->getColor());
        }
    }

    protected function getMapViewFactory(): MapViewFactory
    {
        return self::$container->get(MapViewFactory::class);
    }
}