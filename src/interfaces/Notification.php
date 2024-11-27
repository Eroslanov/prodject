<?php

namespace src\interfaces;

interface Notification
{
    public function send($message): void;
    public function getStatus(): string;
    public function getType(): string;
}