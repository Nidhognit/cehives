<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="map_template")
 */
class MapTemplate
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $map = [];

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $mapItems = [];

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $width;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $height;

    /**
     * @var string
     * @ORM\Column(type="string", length=155, nullable=false)
     */
    protected $name;

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $resourceList;

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $resourceMap;

    public function getId():int
    {
        return $this->id;
    }

    public function getMap(): array
    {
        return $this->map;
    }

    public function setMap(array $map): void
    {
        $this->map = $map;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMapItems(): array
    {
        return $this->mapItems;
    }

    public function setMapItems(array $mapItems): void
    {
        $this->mapItems = $mapItems;
    }

    public function getResourceList(): array
    {
        return $this->resourceList;
    }

    public function setResourceList(array $resourceList): void
    {
        $this->resourceList = $resourceList;
    }

    public function getResourceMap(): array
    {
        return $this->resourceMap;
    }

    public function setResourceMap(array $resourceMap): void
    {
        $this->resourceMap = $resourceMap;
    }
}