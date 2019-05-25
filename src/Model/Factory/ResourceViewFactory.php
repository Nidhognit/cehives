<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Factory;


use Cehevis\Model\Descriptors\DescriptorBuilder\ResourcePanelDescriptorBuilder;
use Cehevis\Model\ResourceView;
use Cehevis\Resources\Mapper\ResourceMapper;

class ResourceViewFactory
{
    /** @var ResourcePanelDescriptorBuilder */
    protected $resourcePanelDescriptorBuilder;

    public function __construct(ResourcePanelDescriptorBuilder $resourcePanelDescriptorBuilder)
    {
        $this->resourcePanelDescriptorBuilder = $resourcePanelDescriptorBuilder;
    }

    /**
     * @param array $resourceTypeList
     * @param array $resourceMap
     * @return ResourceView
     */
    public function create(array $resourceTypeList, array $resourceMap): ResourceView
    {
        $descriptors = [];
        foreach ($resourceTypeList as $resource) {
            $descriptors[$resource['type']] = $this->resourcePanelDescriptorBuilder
                ->build($resource['count'], ResourceMapper::createResource($resource['type']));
        }

        return new ResourceView($descriptors, $resourceMap);
    }
}