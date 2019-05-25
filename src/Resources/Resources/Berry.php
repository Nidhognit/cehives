<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Resources\Resources;


class Berry implements ResourceInterface
{
    public const NAME = 'berry';

    protected const ICON = 'fa fa-raspberry-pi';

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getIcon(): string
    {
        return self::ICON;
    }

}