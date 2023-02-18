<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = new SendEmail($this->details);
        // Mail::to($this->details['email'])->send($email);
        $details =$this->details;
        $template = @$details['template'];
        Mail::send('template-mail.'.$template,$details,function($message)use($details){
            $message->to($details['email'])
                    ->subject($details['subject'])
                    ->from('duytu.vn@outlook.com.vn',$details['email_name']);
                    // ->subject('Welcome to the Tutorials Point');
                    // ->to('email@example.com', 'Mr. Example');
                    // ->sender('email@example.com', 'Mr. Example');
                    // ->returnPath('email@example.com');
                    // ->cc('email@example.com', 'Mr. Example');
                    // ->bcc('email@example.com', 'Mr. Example');
                    // ->replyTo('email@example.com', 'Mr. Example');
                    // ->priority(2);
                    // ->attach('path/to/attachment.txt');
                    // ->embed('path/to/attachment.jpg');
        });
    }

}
