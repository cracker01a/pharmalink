<?php

namespace App\Observers;

use App\Models\Ordonnance;

class OrdonnanceObserver
{
    /**
     * Handle the Ordonnance "created" event.
     */
    public function created(Ordonnance $ordonnance): void
    {

    }

    /**
     * Handle the Ordonnance "updated" event.
     */
    public function updated(Ordonnance $ordonnance): void
    {
        //
    }

    /**
     * Handle the Ordonnance "deleted" event.
     */
    public function deleted(Ordonnance $ordonnance): void
    {
        //
    }

    /**
     * Handle the Ordonnance "restored" event.
     */
    public function restored(Ordonnance $ordonnance): void
    {
        //
    }

    /**
     * Handle the Ordonnance "force deleted" event.
     */
    public function forceDeleted(Ordonnance $ordonnance): void
    {
        //
    }
}
