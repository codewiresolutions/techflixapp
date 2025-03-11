<?php

use App\Models\Project;
use App\Models\Notification;
use GuzzleHttp\Psr7\Request;
use App\Models\IdeaNotification;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use App\Models\ProjectUser;
use App\Models\Timezone;
use Illuminate\Support\Facades\Auth;


if (!function_exists('decryptstring')) {
    function decryptstring($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (Exception $e) {
            $data['status'] = 'error';
            $data['message'] = $e->getMessage();
            return $data;
        }
    }
}

if (!function_exists('encryptstring')) {
    function encryptstring($value)
    {
        return Crypt::encryptString($value);
    }
}
if (!function_exists('rand_color')) {
    function rand_color()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

}


