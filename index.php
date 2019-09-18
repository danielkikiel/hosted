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
$servers = new Server();
$invoices = new Invoices();



if($user->isLoggedIn()) {
    if(Session::exists('domains_items') && Session::exists('server_items') && Session::exists('position_items'))
    {
        Redirect::to('invoices.php?section=dropitems');
    }
    $content->loadTemplate('index.tpl');
    $content->variable('username', escape($user->data()->username));
    $content->variable('name', escape($user->data()->name));
    $content->variable('logouturl', 'logout.php');
    $userrole = "Klient";
    $content->variable('title', 'Strona główna - '.escape($user->data()->name).' - Hosted');
    $content->variable('countServers', $servers->countServers($user->data()->id));
    $content->variable('countInvoices', $invoices->countInvoices($user->data()->id));
    $content->variable('surname', $user->infoUser('user-surname'));
    $content->variable('user-zip', $user->infoUser('user-zip'));
    $content->variable('user-city', $user->infoUser('user-city'));
    $content->variable('user-adresess', $user->infoUser('user-adresess'));

    if($user->hasPermission('admin')) {
        $userrole = "Administrator";
    }
    if($servers->countServers($user->data()->id))
    {

        foreach($servers->viewServers($user->data()->id) as $row) 
        {
            $type = $servers->getServerType($row->type);
            $color = array(1 => 'btn-primary', 2 => 'btn-info', 3 => 'btn-danger');
            $servertray .= '<a class="btn '.$color[$row->type].'">'.$type.'</a> ';
        }
    }
    else
    {
        $servertray = "Nie posiadasz obecnie wykupionej żadnej usługi";
    }


    if(Input::get('section') == "test")
    {
        $item = Session::get('position_items');
        foreach($item as $x => $val) {
            $servertray .= "ID: " . $x ." Typ: ".$val['type']. " id: ".$val['id']. " nazwa: " .$val['name'];
            $servertray .= "<br>";
                    
        }
    }
    $content->variable('serverstray', $servertray);
    $content->variable('role', $userrole);

} else {
    Redirect::to('login.php');
}


echo $content->execute();