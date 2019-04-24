<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Descriptors\DescriptorBuilder;


use Cehevis\Model\Descriptors\MapBlockDescriptor;

class MapBlockDescriptorBuilder
{
    public function build(): MapBlockDescriptor
    {
        return new MapBlockDescriptor();
    }
}