<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Resources\Resources;


class Grain implements ResourceInterface
{
    public const NAME = 'grain';

    protected const ICON = 'text-warning fa fa-pagelines';

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getIcon(): string
    {
        return self::ICON;
    }

}