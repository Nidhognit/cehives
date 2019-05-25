<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Descriptors\DescriptorBuilder;

use Cehevis\Model\Descriptors\ResourcePanelDescriptor;
use Cehevis\Resources\Resources\ResourceInterface;

class ResourcePanelDescriptorBuilder
{
    public function build(int $count, ResourceInterface $resource): ResourcePanelDescriptor
    {
        return new ResourcePanelDescriptor($count, $resource->getName(), $resource->getIcon());
    }
}