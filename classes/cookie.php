<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

class Cookie {
    public static function exists($name) {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name) {
        return $_COOKIE[$name];
    }

    public static function put($name, $value, $expiry) {
        if(setcookie($name, $value, time() + $expiry, '.hosted.pl')) {
            return true;
        }
        return false;
    }

    public static function delete($name) {
        self::put($name, '', time() -1);
    }
}