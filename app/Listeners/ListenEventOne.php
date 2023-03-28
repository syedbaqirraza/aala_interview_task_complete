<?php

namespace App\Listeners;

use App\Events\EventOne;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class ListenEventOne
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventOne  $event
     * @return void
     */
    public function handle(EventOne $event)
    {

        try {
            // error('abc');
            // throw new \Exception('Failed to send order confirmation email');
            Log::info('first listener running');
        } catch (\Exception $e) {
            // if Listeners throw exception when this command will print date in watermark.
            Artisan::call('watermark');
            // in exception also change the message 'run' to 'exception'
            $event->message = 'exception';
            Log::info('first listener not running');
        }

    }
}
