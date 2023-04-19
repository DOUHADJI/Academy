<?php

namespace App\Listeners;

use App\Events\StudentInformationsRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendStudentInformationsRegisteredSuccessNotification
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
    public function handle(StudentInformationsRegistered $event): void
    {
        //
    }
}
