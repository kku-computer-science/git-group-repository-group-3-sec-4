<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogout
{
    public function handle(Logout $event)
    {
        $user = $event->user;
        if ($user) {
            Log::info("User Logout: {$user->name} ({$user->email}) from IP: " . request()->ip());
        }
    }
}
