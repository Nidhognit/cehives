<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model\Descriptors;


class ResourcePanelDescriptor implements \JsonSerializable
{
    /** @var int */
    protected $count = 0;

    /** @var string */
    protected $type;

    /** @var string */
    protected $icon;

    /** @var string */
    protected $name = 'translation@game.resources.name.';

    public function __construct(int $count, string $type, string $icon)
    {
        $this->count = $count;
        $this->type = $type;
        $this->icon = $icon;
        $this->name .= $type;
    }

    public function jsonSerialize(): array
    {
        return [
            'color' => $this->count,
            'type' => $this->type,
            'icon' => $this->icon
        ];
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getName(): string
    {
        return $this->name;
    }
}