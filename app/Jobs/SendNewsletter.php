<?php

namespace App\Jobs;

/** 
 * Mails
 */
use App\Mail\NewsletterMessage;

/**
 * Models
 */
use App\{Newsletter};

/** 
 * Laravel
 */
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** 
     * The subscribers' email.
     */
    protected $email;
    
    /** 
     * Newsletter instance.
     */
    protected $newsletter;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $email, Newsletter $newsletter)
    {
        $this->email = $email;
        $this->newsletter = $newsletter;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(
            new NewsletterMessage($this->newsletter)
        );
    }
}
