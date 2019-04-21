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

    public function getId()
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
}