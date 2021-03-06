<?php

namespace Cehevis\Tests\Model\Factory\Fixtrures;

use Cehevis\Entity\Game;
use Cehevis\Resources\Landscape\Field;
use Cehevis\Resources\Resources\Berry;
use Cehevis\Resources\Resources\Gold;
use Cehevis\Resources\Resources\Grain;
use Cehevis\Tests\TestTools\Fixtrures\AbstractFixtures;

class GameViewFactoryFixture extends AbstractFixtures
{
    protected $defaults = [
        Game::class => [
            'type' => Game::TYPE_SANDBOX,
            'name' => 'name',
            'userId' => 1,
            'originalMapId' => 1,
            'generateHash' => null,
            'resourceList' => [],
            'resourceMap' => []
        ]
    ];

    protected $data = [
        Game::class => [
            [
                'id' => 1,
                'map' => [
                    '0'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'1'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'2'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'3'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'4'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'5'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'6'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'7'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'8'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'9'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'10'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'11'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'12'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'13'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'14'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],'15'=> ['0'=> 'field','1'=> 'field','2'=> 'field','3'=> 'field','4'=> 'field','5'=> 'field','6'=> 'field','7'=> 'field','8'=> 'field','9'=> 'field','10'=> 'field','11'=> 'field','12'=> 'field','13'=> 'field','14'=> 'field','15'=> 'field','16'=> 'field','17'=> 'field','18'=> 'field','19'=> 'field','20'=> 'field','21'=> 'field','22'=> 'field','23'=> 'field','24'=> 'field','25'=> 'field','26'=> 'field','27'=> 'field',],
                    ],
                'mapItems' => [
                    Field::NAME
                ],
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
                'map' => [],
                'mapItems' => [],
                'userId' => 2,
            ]
        ]
    ];
}