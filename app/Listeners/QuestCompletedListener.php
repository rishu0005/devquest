<?php

namespace App\Listeners;

use App\Events\QuestCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class QuestCompletedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(QuestCompleted $event): void
    {
        //
    }
}
