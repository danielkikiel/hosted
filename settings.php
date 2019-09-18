<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

require_once 'core/init.php';

$content = new Template;



$userrole = "";

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
    $content->loadTemplate('settings.tpl');
    $content->variable('username', escape($user->data()->username));
    $content->variable('name', escape($user->data()->name));
    $content->variable('logouturl', 'logout.php');
    $userrole = "Klient";
    $content->variable('title', 'Ustawienia - '.escape($user->data()->name).' - Hosted');
    if($user->hasPermission('admin')) {
        $userrole = "Administrator";
    }
    $content->variable('surname', $user->infoUser('user-surname'));
    $content->variable('user-zip', $user->infoUser('user-zip'));
    $content->variable('user-city', $user->infoUser('user-city'));
    $content->variable('user-adresess', $user->infoUser('user-adresess'));
    $content->variable('role', $userrole);

} else {
    Redirect::to('index.php');

}


echo $content->execute();