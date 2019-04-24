<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Descriptors;


class MapBlockDescriptor implements BlockDescriptorInterface
{
    /** @var string */
    protected $collor;
    /** @var string */
    protected $type;

    public function __construct(string $collor, string $type)
    {
        $this->collor = $collor;
        $this->type = $type;
    }

    public function jsonSerialize(): array
    {
        return [
            'color' => $this->collor,
            'type' => $this->type
        ];
    }

    public function getCollor(): string
    {
        return $this->collor;
    }

    public function getType(): string
    {
        return $this->type;
    }
}