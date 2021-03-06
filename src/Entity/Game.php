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
 * @ORM\Table(name="game")
 * @ORM\HasLifecycleCallbacks()
 */
class Game
{
    public const TYPE_SANDBOX = 1;
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=155, nullable=false, unique=true)
     */
    protected $id_hash;

    /**
     * @var int
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(type="string", length=155, nullable=false)
     */
    protected $name;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $user_id;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $dateCreated;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $originalMapId;

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
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $resourceList;

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $resourceMap;

    public function generateHash(): void
    {
        $this->id_hash = sha1(time() . $this->user_id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated(): \DateTime
    {
        return $this->dateCreated;
    }

    public function getOriginalMapId(): int
    {
        return $this->originalMapId;
    }

    public function setOriginalMapId(int $originalMapId): void
    {
        $this->originalMapId = $originalMapId;
    }

    public function getMap(): array
    {
        return $this->map;
    }

    public function setMap(array $map): void
    {
        $this->map = $map;
    }

    public function getIdHash(): string
    {
        return $this->id_hash;
    }

    public function getMapItems(): array
    {
        return $this->mapItems;
    }

    public function setMapItems(array $mapItems): void
    {
        $mapItems = array_unique($mapItems);
        $this->mapItems = $mapItems;
    }

    /**
     * @throws \Exception
     * @ORM\PrePersist
     */
    public function doPrePersist(): void
    {
        $this->dateCreated = new \DateTime();
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