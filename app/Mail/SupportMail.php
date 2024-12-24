<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * SupportMail Class
 *
 * This class is responsible for sending support emails using Laravel's Mailable system.
 * It accepts details from the user and constructs the email content accordingly.
 */
class SupportMail extends Mailable
{
    // Use Queueable and SerializesModels traits for queuing and serializing mail objects
    use Queueable, SerializesModels;

    /**
     * The details for the support email.
     *
     * @var array
     */
    public $details;

    /**
     * Create a new message instance.
     *
     * @param array $details Contains the support message details (e.g., sender's name, email, message).
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the email message.
     *
     * This method constructs the email by setting the subject and the view.
     * It also passes the details to the email view.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('رسالة دعم جديدة')      // Set the subject of the email
                    ->view('emails.support')          // Specify the email view template to use
                    ->with('details', $this->details); // Pass the details to the email view
    }
}
