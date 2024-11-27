<?php

use PHPUnit\Framework\TestCase;
use src\EmailNotification;
use src\SMSNotification;
use src\NotificationManager;

class NotificationManagerTest extends TestCase
{
    public function testSendNotification()
    {
        $manager = new NotificationManager();
        $emailNotification = new EmailNotification("Test Subject");
        $manager->sendNotification($emailNotification, "Test Message");

        $history = $manager->getNotificationHistory();
        $this->assertCount(1, $history);
        $this->assertEquals("success", $history[0]['status']);
    }

    public function testGetNotificationHistory()
    {
        $manager = new NotificationManager();
        $emailNotification = new EmailNotification("Test Subject");
        $smsNotification = new SMSNotification();

        $manager->sendNotification($emailNotification, "Test Message");
        $manager->sendNotification($smsNotification, "Short message");

        $history = $manager->getNotificationHistory();
        $this->assertCount(2, $history);
    }
}