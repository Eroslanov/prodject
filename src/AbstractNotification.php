<?php

namespace src;

use src\interfaces\Notification;

abstract class AbstractNotification implements Notification
{
    protected $status;
    protected $timestamp;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    abstract public function send($message): void;
}