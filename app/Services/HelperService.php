<?php


namespace App\Services;

 
class HelperService
{


    public static function cookieToken(string $token, bool $logout = false)
    {
        //TODO change secure to false or http only to false
        return cookie('access_token', $token, config('custom.token_cookie_ttl') * ($logout ? -1 : 1), path: '/', domain: null, secure: false, httpOnly: false);
    }
 
}
