<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Factory;

use Cehevis\Entity\Game;
use Cehevis\Model\GameView;

class GameViewFactory
{
    /** @var MapViewFactory */
    protected $mapViewFactory;

    public function __construct(MapViewFactory $mapViewFactory)
    {
        $this->mapViewFactory = $mapViewFactory;
    }

    public function create(Game $game): GameView
    {
        $mapView = $this->mapViewFactory->create($game->getMap());

        return new GameView($mapView);
    }
}