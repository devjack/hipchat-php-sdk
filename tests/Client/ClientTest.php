<?php

namespace DevJack\HipChatSDK\Tests;

use DevJack\HipChatSDK\HipChatClient;

class ClientTest extends \PHPUnit_Framework_TestCase {

    public function testHipChatClient() {

        $client = new HipChatClient([
            'token' => getenv('HIPCHAT_TOKEN'),
        ]);

        $room = $client->getRoomById(['room_id'=>'1648695']);
        $this->assertNotEmpty($room);

    }

}
