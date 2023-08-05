<?php

namespace App\Services\Actions\User;

use Carbon\Carbon;
use App\Models\Session;
use App\Services\Contracts\User\ProfileContract;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class ProfileAction implements ProfileContract
{

    public function execute($user)
    {

        $this->updateSession();
        $userSessions = Session::where('user_id', $user->id)->get();

        $lastActivities=$this->lastActivities($userSessions);
        $username = $user->name;

        return view('user.profile', compact('username', 'userSessions', 'lastActivities'));
    }

    private function lastActivities($userSessions){
        $userTimezone = 'Asia/Almaty';
        $lastActivities = [];
        foreach ($userSessions as $session) {
            $lastActivityTime = Carbon::createFromTimestamp($session->last_activity)->setTimezone($userTimezone);
            $lastActivities[] = $lastActivityTime->format('Y-m-d H:i:s');
        }
        return $lastActivities;
    }
    private function updateSession(){
        $currentSessionId = session()->getId();
        $usersave = Session::query()->find( $currentSessionId);
        $agent = new Agent();
        $usersave->browser = $agent->browser();
        $usersave->os = $agent->platform();
        $usersave->save();
    }
}
