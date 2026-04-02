<?php

use App\Models\Log;

if (!function_exists('logActivity')) {
    function logActivity($message, $userId = null)
    {
        \App\Models\Log::create([
            'message' => $message,
            'user_id' => $userId ?? auth()->id(),
        ]);
    }
}
