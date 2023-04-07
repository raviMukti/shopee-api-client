<?php


namespace Haistar\ShopeePhpSdk\client;


class SignGenerator
{
    public static function generateSign($baseString, $key){

        /*return hash_hmac('sha256', utf8_encode($baseString), $key);*/

        /*this is the updated way of generating Sign -> base on this https://open.shopee.com/developer-guide/20 */
        return hash_hmac('sha256', $baseString, $key);
    }
}