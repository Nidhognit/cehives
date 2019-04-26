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
    protected $color;
    /** @var string */
    protected $type;

    public function __construct(string $color, string $type)
    {
        $this->color = $color;
        $this->type = $type;
    }

    public function jsonSerialize(): array
    {
        return [
            'color' => $this->collor,
            'type' => $this->type
        ];
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getType(): string
    {
        return $this->type;
    }
}