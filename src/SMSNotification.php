<?php

namespace src;

use src\interfaces\Notification;

class SMSNotification extends AbstractNotification implements Notification
{
    public function send($message): void
    {
        if (strlen($message) > 160) {
            $this->status = "failed: Message too long";
            return;
        }

        try {
            // Simulate sending SMS
            $this->status = "success";
            $this->timestamp = date('Y-m-d H:i:s');
        } catch (\Exception $e) {
            $this->status = "failed: " . $e->getMessage();
        }
    }

    public function getType(): string
    {
        return "sms";
    }
}