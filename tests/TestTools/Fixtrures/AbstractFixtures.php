<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Tests\TestTools\Fixtrures;


abstract class AbstractFixtures implements FixturesInterface
{
    /** @var array */
    protected $defaults = [];
    /** @var array */
    protected $data = [];

    protected function getDefaults(): array
    {
        return $this->defaults;
    }

    public function getFixturesData(): array
    {
        $result = [];
        foreach ($this->data as $entity => $data) {
            foreach ($data as $key => $entityData) {
                if (isset($this->defaults[$entity])) {
                    $result[$entity][$key] = array_merge($this->defaults[$entity], $entityData);
                } else {
                    $result[$entity][$key] = $data;
                }
            }
        }

        return $result;
    }
}