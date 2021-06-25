<?php

namespace App\Listeners;

use App\Events\EventOne;
use App\Save;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class EventListener
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
     * @param  EventOne  $event
     * @return void
     */
    public function handle(EventOne $event)
    {
//        dd($event->event->category_id);
        Log::info('bu ', ['product' => $event] );
        if($event->event->category_id == 1){
            Save::create([
                'product_id' => $event->event->id,
                'category' => $event->event->category->name,
                'save' => '5 kun'
            ]);
        } else{
            Save::create([
                'product_id' => $event->event->id,
                'category' => $event->event->category->name,
                'save' => '20 kun'
            ]);
        }
    }
}
