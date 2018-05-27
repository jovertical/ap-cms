<?php

namespace App\Mail;

/**
 * Models
 */
use App\{Newsletter as NewsletterModel};

/**
 * Laravel
 */
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Newsletter instance.
     */
    protected $newsletter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(NewsletterModel $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $newsletter = $this->markdown('emails.newsletter')->with([
            'newsletter' => $this->newsletter
        ]);

        if ($this->newsletter->file_path != null) {
            $newsletter->attach($this->newsletter->file_path, [
                'as' => $this->newsletter->file_name
            ]);
        }

        return $newsletter;
    }
}
