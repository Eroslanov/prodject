<?php

use PHPUnit\Framework\TestCase;
use src\SMSNotification;

class SMSNotificationTest extends TestCase
{
    public function testSendSuccess(): void
    {
        $notification = new SMSNotification();
        $notification->send("Short message");
        $this->assertEquals("success", $notification->getStatus());
    }

    public function testSendFailure(): void
    {
        $notification = new SMSNotification();
        $longMessage = str_repeat("a", 161);
        $notification->send($longMessage);
        $this->assertEquals("ошибка: сообщение слишком длинное", $notification->getStatus());
    }

    public function testGetType(): void
    {
        $notification = new SMSNotification();
        $this->assertEquals("sms", $notification->getType());
    }
}
