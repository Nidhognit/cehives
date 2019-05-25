<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model;

use Cehevis\Model\Descriptors\ResourcePanelDescriptor;

class ResourceView
{
    /** @var ResourcePanelDescriptor[] */
    protected $descriptorList;
    /** @var array */
    protected $map;

    public function __construct(array $descriptorList, array $map)
    {
        $this->descriptorList = $descriptorList;
        $this->map = $map;
    }

    /**
     * @return ResourcePanelDescriptor[]
     */
    public function getDescriptorList(): array
    {
        return $this->descriptorList;
    }

    public function getMap(): array
    {
        return $this->map;
    }
}