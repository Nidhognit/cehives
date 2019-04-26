<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Factory;

use Cehevis\Model\Descriptors\DescriptorBuilder\MapBlockDescriptorBuilder;
use Cehevis\Model\MapView;
use Cehevis\Resources\Mapper\LandscapeMapper;

class MapViewFactory
{
    public const BLOCK_SIZE = 35;
    /** @var MapBlockDescriptorBuilder */
    protected $descriptorBuilder;

    public function create(array $map, array $mapItems): MapView
    {
        $descriptorList = [];
        foreach ($mapItems as $item) {
            $descriptorList[$item] = $this->descriptorBuilder->build(LandscapeMapper::createLandscape($item));
        }

        return new MapView(1400, 800, $map, self::BLOCK_SIZE, $descriptorList);
    }
}