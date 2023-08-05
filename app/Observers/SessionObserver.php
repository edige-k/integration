<?php

namespace App\Observers;

use App\Models\Session;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;

class SessionObserver
{

    /**
     * Handle the Session "created" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */

    public function creating(Session $session)
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $platform = $agent->platform();

        $session->browser = $browser;
        $session->os = $platform;

    }
    /**
     * Handle the Session "updated" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function updated(Session $session)
    {
        //
    }

    /**
     * Handle the Session "deleted" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function deleted(Session $session)
    {
        //
    }

    /**
     * Handle the Session "restored" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function restored(Session $session)
    {
        //
    }

    /**
     * Handle the Session "force deleted" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function forceDeleted(Session $session)
    {
        //
    }
}
