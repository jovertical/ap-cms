<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResourceUpdated extends Notification
{
    use Queueable;

    protected $user;

    protected $resource;

    protected $redirect_to;

    protected $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $resource, $redirect_to, $name = 'name')
    {
        $this->user = $user;
        $this->resource = $resource;
        $this->redirect_to = $redirect_to;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $name = $this->name;

        return [
            'subject' => $this->user->full_name.' has updated the '.class_basename($this->resource).': '.$this->resource->$name,
            'redirect_to' => is_null($redirect_to = $this->redirect_to) ? '#' : url($redirect_to),
        ];
    }
}
