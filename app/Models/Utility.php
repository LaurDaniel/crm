<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Date;

class Utility extends Model
{
    public static function getValByName($key)
    {
         $setting = Utility::settings();

        if(!isset($_ENV[$key]) || empty($_ENV[$key]))
        {
            $_ENV[$key] = '';
        }

        return $_ENV[$key];
    }


    public static function settings()
    {
        $settings = [
            "gdpr_cookie" => "",
            "cookie_text" => "",
        ];

    }


}
