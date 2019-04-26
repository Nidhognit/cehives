<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Resources\Mapper;


use Cehevis\Resources\Landscape\Field;
use Cehevis\Resources\Landscape\LandscapeInterface;

class LandscapeMapper
{
    protected static $map = [
        Field::NAME => Field::class
    ];

    public static function createLandscape(string $name): LandscapeInterface
    {
        if (isset(self::$map[$name])) {
            return new self::$map[$name];
        }

        throw new \InvalidArgumentException('Landscape whith name ' . $name . ' not found in mapper');
    }
}