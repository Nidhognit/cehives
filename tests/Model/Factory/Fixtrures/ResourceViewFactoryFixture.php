<?php

namespace Cehevis\Tests\Model\Factory\Fixtrures;

use Cehevis\Entity\Game;
use Cehevis\Resources\Resources\Berry;
use Cehevis\Resources\Resources\Gold;
use Cehevis\Resources\Resources\Grain;
use Cehevis\Tests\TestTools\Fixtrures\AbstractFixtures;

class ResourceViewFactoryFixture extends AbstractFixtures
{
    protected $defaults = [
        Game::class => [
            'type' => Game::TYPE_SANDBOX,
            'name' => 'name',
            'userId' => 1,
            'originalMapId' => 1,
            'generateHash' => null,
            'map' => [],
            'mapItems' => [],
        ]
    ];

    protected $data = [
        Game::class => [
            [
                'id' => 1,
                'resourceList' => [
                    [
                        'type' => Berry::NAME,
                        'count' => 20
                    ],
                    [
                        'type' => Gold::NAME,
                        'count' => 1000
                    ],
                    [
                        'type' => Grain::NAME,
                        'count' => 10
                    ],
                ],
                'resourceMap' => []
            ],
            [
                'id' => 2,
                'userId' => 2,
                'resourceList' => [
                    [
                        'type' => Berry::NAME,
                        'count' => 20
                    ],
                    [
                        'type' => Berry::NAME,
                        'count' => 100
                    ],
                    [
                        'type' => Gold::NAME,
                        'count' => 1000
                    ],
                    [
                        'type' => Grain::NAME,
                        'count' => 100
                    ],
                ],
                'resourceMap' => []
            ],
        ]
    ];
}