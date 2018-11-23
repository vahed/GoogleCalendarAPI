<?php

namespace JackNersary\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{
    use Queueable;
    protected $school_c_n;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
	 // new InvoicePaid($school_club_booking);
    public function __construct($school_club_Notification )
    {
        //
		$this->school_c_n = $school_club_Notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
		            ->subject('Payment receipt')
		            ->success()
                    ->line('This is your email payment receipt.')
                    ->action('Our website', url('/'))
                    ->line('Thank you for your recent payment!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
