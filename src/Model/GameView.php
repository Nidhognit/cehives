<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model;


class GameView implements \JsonSerializable
{
    /** @var MapView */
    protected $map;

    protected $buildings;

    protected $units;
    /** @var ResourceView */
    protected $resources;

    public function __construct(MapView $map, ResourceView $resources)
    {
        $this->map = $map;
        $this->resources = $resources;
    }

    public function jsonSerialize(): array
    {
        return [
            'map' => $this->map
        ];
    }

    /**
     * @return MapView
     */
    public function getMap(): MapView
    {
        return $this->map;
    }

    public function getResources(): ResourceView
    {
        return $this->resources;
    }
}