<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\SendEmailEvent;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SendEmailEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::send([],[], function($message) {
            //dd(get_class_methods($message));
            $message->subject($this->event->getSubject());
            $message->setBody($this->event->getBody());
            $message->to($this->event->getTo());
        });
    }
}
