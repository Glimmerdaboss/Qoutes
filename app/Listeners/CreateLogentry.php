<?php

namespace App\Listeners;

use App\Events\QuoteCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\QuoteLog;

class CreateLogentry
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
     * @param  QuoteCreated  $event
     * @return void
     */
    public function handle(QuoteCreated $event)
    {
        $author = $event->author_name;
        $log_entery = new QuoteLog();
        $log_entery->author = $author;
        $log_entery->save();

    }
}
