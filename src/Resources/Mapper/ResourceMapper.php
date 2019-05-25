<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Resources\Mapper;

use Cehevis\Resources\Resources\Berry;
use Cehevis\Resources\Resources\Gold;
use Cehevis\Resources\Resources\Grain;
use Cehevis\Resources\Resources\ResourceInterface;

class ResourceMapper
{
    protected static $map = [
        Berry::NAME => Berry::class,
        Gold::NAME => Gold::class,
        Grain::NAME => Grain::class,
    ];

    public static function createResource(string $name): ResourceInterface
    {
        if (isset(self::$map[$name])) {
            return new self::$map[$name];
        }

        throw new \InvalidArgumentException('Resource with name ' . $name . ' not found in mapper');
    }
}