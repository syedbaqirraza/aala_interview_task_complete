<?php

namespace App\Listeners;

use App\Events\EventOne;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class ListenEventTwo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventTwo  $event
     * @return void
     */
    public function handle(EventOne $event)
    {
        $value = $event->message;

        if ($value == 'run') {
            try {
                // throw new \Exception('Failed to send order confirmation email');
                Log::info('second listener running');
            } catch (\Exception $e) {
                // if Listeners throw exception when this command will print date and first command param in watermark.
                Artisan::call('watermark ' . $event->data[0]);
                Log::info('second listener not running');
                // in exception also change the message 'run' to 'exception'
                $event->message = 'exception';
            }
        } else {
            $event->message = 'exception';
            Log::info('second listener not running');
        }
    }
}
