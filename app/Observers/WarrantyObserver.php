<?php

namespace App\Observers;

use App\Libraries\WarrantyService;
use App\Models\Warranty;

class WarrantyObserver
{
    /**
     * Handle the Warranty "created" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function created(Warranty $warranty)
    {
        $service = new WarrantyService();
        $service->sendNotification($warranty);
    }

    /**
     * Handle the Warranty "updated" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function updated(Warranty $warranty)
    {
        $service = new WarrantyService();
        $service->sendNotification($warranty);
    }

    /**
     * Handle the Warranty "deleted" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function deleted(Warranty $warranty)
    {
        //
    }

    /**
     * Handle the Warranty "restored" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function restored(Warranty $warranty)
    {
        //
    }

    /**
     * Handle the Warranty "force deleted" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function forceDeleted(Warranty $warranty)
    {
        //
    }
}
