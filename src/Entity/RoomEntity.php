<?php

namespace DevJack\HipChatSDK\Entity;

use DevJack\HipChatSDK\Entity\Interfaces\RoomInterface;

class RoomEntity implements RoomInterface
{

    protected $data = null;

    public function __construct(array $data) {
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return $this->data['name'];
    }

}