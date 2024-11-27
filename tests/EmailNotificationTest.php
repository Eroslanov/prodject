<?php

use PHPUnit\Framework\TestCase;
use src\EmailNotification;

class EmailNotificationTest extends TestCase
{
    public function testSend()
    {
        $notification = new EmailNotification("Test Subject");
        $notification->send("Test Message");
        $this->assertEquals("success", $notification->getStatus());
    }

    public function testGetType()
    {
        $notification = new EmailNotification("Test Subject");
        $this->assertEquals("email", $notification->getType());
    }
}