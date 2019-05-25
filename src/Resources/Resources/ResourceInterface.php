<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Resources\Resources;


interface ResourceInterface
{
    public static function getName(): string;

    public static function getIcon(): string;
}