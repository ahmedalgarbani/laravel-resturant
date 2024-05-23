<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
class OrderNotification extends Notification
{
    use Queueable;
    private $orderData;
    private $message;
    private $route;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderData,$message,$route)
    {
        $this->orderData = $orderData;
        $this->message = $message;
        $this->route = $route;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ 'database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'Data_id' => $this->orderData['id'],
            'message' => $this->message,
            'route' => $this->route,
        ];
    }
}
