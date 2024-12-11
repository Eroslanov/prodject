Вот ваш код с типами данных для полей и методов:

```php
<?php

namespace src;

use src\interfaces\Notification;

class NotificationManager
{
    private array $history = [];

    public function sendNotification(Notification $notification, string $message): void
    {
        try {
            $notification->send($message);
            $this->history[] = [
                'type' => $notification->getType(),
                'status' => $notification->getStatus(),
                'timestamp' => $notification->getTimestamp()
            ];
            $this->logNotification($notification);
        } catch (\Exception $e) {
            error_log("Не удалось отправить уведомление: " . $e->getMessage());
        }
    }

    public function getNotificationHistory(): array
    {
        return $this->history;
    }

    private function logNotification(Notification $notification): void
    {
        $logMessage = sprintf(
            "Type: %s, Status: %s, Timestamp: %s\n",
            $notification->getType(),
            $notification->getStatus(),
            $notification->getTimestamp()
        );
        file_put_contents('notification.log', $logMessage, FILE_APPEND);
    }
}
