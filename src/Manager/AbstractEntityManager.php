<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Manager;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractEntityManager
{
    /** @var EntityManagerInterface */
    protected $em;
    /** @var ObjectRepository */
    protected $mapRepository;

    protected function getRepository(): ObjectRepository
    {
        if (!$this->mapRepository) {
            $this->mapRepository = $this->em->getRepository($this->getEntityClass());
        }

        return $this->mapRepository;
    }

    abstract public function getEntityClass(): string;
}