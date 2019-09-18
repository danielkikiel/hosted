<?php
/**
	 *
	 * @copyright	(c) 2016 hosted.pl
	 * @author 		Daniel Kikiel for hosted.pl
	 *
	 */

class Hash {
    public static function make($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    public static function salt($length) {
        return mcrypt_create_iv($length);
    }

    public static function unique() {
        return self::make(uniqid());
    }
}