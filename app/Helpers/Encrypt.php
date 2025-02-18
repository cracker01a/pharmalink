<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class Encrypt
{
    public static function encryptData($data, $key)
    {
        return Crypt::encryptString($data);
    }

    public static function decryptData($data, $key)
    {
        return Crypt::decryptString($data);
    }
}
