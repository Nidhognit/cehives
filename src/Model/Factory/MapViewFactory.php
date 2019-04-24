<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Factory;

use Cehevis\Model\Descriptors\DescriptorBuilder\MapBlockDescriptorBuilder;
use Cehevis\Model\MapView;

class MapViewFactory
{
    public const BLOCK_SIZE = 35;
    /** @var MapBlockDescriptorBuilder */
    protected $descriptorBuilder;

    public function create(array $map): MapView
    {
//        $descriptor = $this->descriptorBuilder->build();

        return new MapView(1400, 800, $map, self::BLOCK_SIZE, []);
    }
}