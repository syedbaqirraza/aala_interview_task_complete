<?php

namespace App\Listeners;

use App\Events\EventOne;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ListenEventThree
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
     * @param  \App\Events\EventThree  $event
     * @return void
     */
    public function handle(EventOne $event)
    {
        $value = $event->message;
        if ($value == 'run') {
            try {
                // throw new \Exception('Failed to send order confirmation email');
                Artisan::call('watermark ' . $event->data[0] . ' ' . $event->data[1] . ' ' . $event->data[2]);
                Log::info('third listener running');
            } catch (\Exception $e) {
                Log::info('third listener not running');
                Artisan::call('watermark ' . $event->data[0] . ' ' . $event->data[1]);
            }
        } else {
            Log::info('third listener not running');
        }

    }
}
