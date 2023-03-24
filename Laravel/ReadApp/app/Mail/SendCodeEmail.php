<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCodeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user, $course;

    public function __construct($c,$u)
    {
        $this->course = $c;
        $this->user = $u;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Course $course, User $user)
    {
        return $this->markdown('email.sendcode',compact('user','course'))
            ->subject('You have been sent a class code!');
    }
}
