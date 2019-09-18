<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

ini_set('session.cookie_domain', '.hosted.pl');
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'hosted',
        'password' => 'oZ62SNGWwWhmHdutjRh',
        'db' => 'hosted_panel'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

require_once 'classes/config.php';
require_once 'classes/cookie.php';
require_once 'classes/db.php';
require_once 'classes/hash.php';
require_once 'classes/input.php';
require_once 'classes/redirect.php';
require_once 'classes/session.php';
require_once 'classes/token.php';
require_once 'classes/user.php';
require_once 'classes/validate.php';
require_once 'classes/Template.php';
require_once 'classes/servers.php';
require_once 'classes/invoices.php';
require_once 'classes/mail.php';
require_once 'classes/position.php';
require_once 'classes/domains.php';
require_once 'classes/cart.php';


require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}