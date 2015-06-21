<?php
return [
    'spec' => [
        'getRoomById' => [
            'httpMethod' => 'GET',
            'uri' => 'room/{room_id}',
            'responseModel' => "jsonResponse",
            'parameters' => [
                'room_id' => [
                    'type' => 'string',
                    'location' => 'uri'
                ],
            ],
        ],
    ],
    "models" => [
        "jsonResponse" => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ],
            'properties' => [

            ],
        ],
    ],
];