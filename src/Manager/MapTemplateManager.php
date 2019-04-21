<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace App\Manager;

use App\Entity\MapTemplate;
use Doctrine\ORM\EntityManagerInterface;

class MapTemplateManager extends AbstractEntityManager
{
    public function getEntityClass(): string
    {
        return MapTemplate::class;
    }

    /**
     * GameSandboxManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return MapTemplate[]
     */
    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

    /**
     * @param int $id
     * @return MapTemplate|null
     */
    public function find(int $id)
    {
        return $this->getRepository()->find($id);
    }

}