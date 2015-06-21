<?php

namespace DevJack\HipChatSDK\Behaviour;

use DevJack\HipChatSdk\Entity\RoomEntity;

interface RoomEndpoint {

    /**
     * @param $id
     * @return RoomEntity
     */
    public function getRoomById($id);

}