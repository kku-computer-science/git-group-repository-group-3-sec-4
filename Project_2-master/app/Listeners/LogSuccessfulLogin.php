<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;
        Log::info("User Login: {$user->name} ({$user->email}) from IP: " . request()->ip());
    }
}
