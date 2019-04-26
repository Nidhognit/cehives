<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Resources\Landscape;


class Field implements LandscapeInterface
{
    protected const COLOR = 'green';
    public const NAME = 'field';

    public function getColor(): string
    {
        return self::COLOR;
    }

    public function getName():string
    {
        return self::NAME;
    }
}