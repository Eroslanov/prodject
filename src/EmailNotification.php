<?php

namespace src;

use src\interfaces\Notification;

class EmailNotification extends AbstractNotification implements Notification
{
    private $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function send($message): void
    {
        try {
            // Simulate sending email
            $this->status = "success";
            $this->timestamp = date('Y-m-d H:i:s');
        } catch (\Exception $e) {
            $this->status = "failed: " . $e->getMessage();
        }
    }

    public function getType(): string
    {
        return "email";
    }
}