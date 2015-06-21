<?php

namespace DevJack\HipChatSDK\Behaviour\Feature;

use DevJack\HipChatSDK\HipChatClient;
use DevJack\HipChatSDK\Entity\Interfaces\RoomInterface;

trait RoomEndpointTrait
{
    /** @var HipChatClient $this */

    /**
     * @param $id
     * @return RoomInterface
     */
    public function getRoomById($id) {
        return $this->doApiCall(__FUNCTION__, ['room_id' => (int) $id]);

    }

}