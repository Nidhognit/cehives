<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Tests\TestTools\TestCases;

use Cehevis\Tests\TestTools\Loader\FixturesLoader;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class DbTestCase extends KernelTestCase
{
    /** @var EntityManager */
    protected $em;

    /** @var FixturesLoader */
    private $fixtureLoader;

    abstract protected function getFixtures(): array;

    public function setUP()
    {
        self::bootKernel();
        $this->em = self::$container->get('doctrine')->getManager();
        $this->fixtureLoader = new FixturesLoader($this->em);

        $this->loadFixtures();
    }

    protected function loadFixtures(): void
    {
        $this->fixtureLoader->load($this->getFixtures());
    }
}