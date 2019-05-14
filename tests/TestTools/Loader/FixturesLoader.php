<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Tests\TestTools\Loader;


use Cehevis\Tests\TestTools\Fixtrures\FixturesInterface;
use Doctrine\ORM\EntityManager;

class FixturesLoader
{
    /** @var array array */
    protected $fixtures = [];

    /** @var EntityManager */
    protected $em;

    /**
     * FixturesLoader constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function load(array $fixtures): void
    {
        $list = $this->checkFixtures($fixtures);
        /** @var FixturesInterface $fixture */
        foreach ($list as $fixture) {
            $this->loadFixture($fixture);
        }

    }

    protected function checkFixtures(array $fixtures): array
    {
        $result = [];
        foreach ($fixtures as $class) {
            $fixture = new $class;
            if ($fixture instanceof FixturesInterface) {
                $result[] = $fixture;
            }
        }

        return $result;
    }

    protected function loadFixture(FixturesInterface $fixture): void
    {
        foreach ($fixture->getFixturesData() as $entity => $data) {
            $this->removeEntity($entity);
            $this->disableAutoGenerateId($entity);
            $this->createNewEntities($entity, $data);
            $this->em->flush();
        }
    }

    protected function removeEntity(string $entity): void
    {
        $query = $this->em->getRepository($entity)
            ->createQueryBuilder('en')
            ->delete()
            ->getQuery();

        $query->execute();
    }

    protected function disableAutoGenerateId(string $entity): void
    {
        $metadata = $this->em->getClassMetaData($entity);
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());
    }

    protected function createNewEntities(string $entity, array &$dataList): void
    {
        foreach ($dataList as $data) {
            $class = new $entity;
            foreach ($data as $method => $value) {
                $setMethod = 'set' . $method;
                if (method_exists($class, $setMethod)) {
                    $class->$setMethod($value);
                    continue;
                }
                if (property_exists($class, $method)) {
                    $ref = new \ReflectionObject($class);

                    $refProp = $ref->getProperty($method);
                    $refProp->setAccessible(TRUE);
                    $refProp->setValue($class, $value);
                }
                if ($value === null) {
                    $class->$method();
                    continue;
                }
            }
            $this->em->persist($class);
        }
    }

}