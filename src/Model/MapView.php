<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Model;


use Cehevis\Model\Descriptors\MapBlockDescriptor;

class MapView implements \JsonSerializable
{
    /** @var int */
    protected $width;
    /** @var int */
    protected $height;
    /** @var array */
    protected $map = [];
    /** @var int */
    protected $blockSize;
    /** @var MapBlockDescriptor[] */
    protected $viewDescriptor = [];

    public function __construct(int $width, int $height, array $map, int $blockSize, array $viewDescriptor)
    {
        $this->width = $width;
        $this->height = $height;
        $this->map = $map;
        $this->blockSize = $blockSize;
        $this->viewDescriptor = $viewDescriptor;
    }

    public function jsonSerialize(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'map' => $this->map,
            'blockSize' => $this->blockSize,
            'viewDescriptor' => $this->viewDescriptor
        ];
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getMap(): array
    {
        return $this->map;
    }

    public function getBlockSize(): int
    {
        return $this->blockSize;
    }

    /**
     * @return MapBlockDescriptor[]
     */
    public function getViewDescriptor(): array
    {
        return $this->viewDescriptor;
    }

}