<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Website;

class PostWebNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $website;
    public $postTitle;
    public $postDescription;

    public function __construct(Website $website, $postTitle, $postDescription)
    {
        $this->website = $website;
        $this->postTitle = $postTitle;
        $this->postDescription = $postDescription;
    }

    public function build()
    {
        return $this->subject('New Post on ' . $this->website->name)
            ->view('emails.email');
    }
}
