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
    /** @var ResourceViewFactory */
    protected $resourceViewFactory;

    public function __construct(MapViewFactory $mapViewFactory, ResourceViewFactory $resourceViewFactory)
    {
        $this->mapViewFactory = $mapViewFactory;
        $this->resourceViewFactory = $resourceViewFactory;
    }

    public function create(Game $game): GameView
    {
        $mapView = $this->mapViewFactory->create($game->getMap(), $game->getMapItems());
        $resourceView = $this->resourceViewFactory->create($game->getResourceList(), $game->getResourceMap());

        return new GameView($mapView, $resourceView);
    }
}