<?php
use DevJack\HipChatSDK\Entity\RoomEntity;

return [
    'spec' => [
        'getRoomById' => [
            'httpMethod' => 'GET',
            'uri' => 'room/{room_id}',
            'responseModel' => RoomEntity::class,
            'parameters' => [
                'room_id' => [
                    'type' => 'string',
                    'location' => 'uri'
                ],
            ],
        ],
    ],
    "models" => [
        RoomEntity::class => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ],
            'properties' => [

            ],
        ],
    ],
];