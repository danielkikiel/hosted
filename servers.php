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
$mail = new Mail();

$DB = DB::getInstance();

if($user->isLoggedIn()) {
    $content->loadTemplate('servers.tpl');
    $content->variable('username', escape($user->data()->username));
    $content->variable('name', escape($user->data()->name));
    $content->variable('logouturl', 'logout.php');
    $userrole = "Klient";
    $content->variable('title', 'Twoje serwery - '.escape($user->data()->name).' - Hosted');
    if($user->hasPermission('admin')) {
        $userrole = "Administrator";
    }
    $content->variable('countServers', $servers->countServers($user->data()->id));

    $content->variable('role', $userrole);
   # $server = "";
    if($servers->countServers($user->data()->id))
    {
             
        foreach($servers->viewServers($user->data()->id) as $row) 
        {
           $type = $servers->getServerType($row->type);
           $color = array(1 => 'panel-purple', 2 => 'panel-blue', 3 => 'panel-red');

           $server .= '<div class="col-md-6">';
           if($row->status == 0)
           {
                $server .= '<div style="position: absolute;left: 23%;top: 25%;font-size: 24pt;"><center>Serwer nieopłacony</center></div>';
           }
           $server .= '
                            <div class="panel '.$color[$row->type].'" ';
           if($row->status == 0)
           {
                $server .= 'style="opacity: 0.3;"';
           }
           $server .= '>
                                <div class="panel-heading">
                                    <h3 class="panel-title">'.$type.'</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="server-load">
                                                        <div class="server-stat">
                                                            <span>Użyta przestrzeń</span>
                                                            <p>0GB</p>
                                                        </div>
                                                        <div class="server-stat">
                                                            <span>Całkowita przestrzeń</span>
                                                            <p>0GB</p>
                                                        </div>
                                                        <div class="server-stat">
                                                            <span>CPU</span>
                                                            <p>0%</p>
                                                        </div>
                                                        <div class="server-stat">
                                                            <span>RAM</span>
                                                            <p>0%</p>
                                                        </div>
                                      </div>

                                        <div class="btn-group dropup" style="float: right;">
                                            <a href="https://s1.hosted.pl:2083" class="btn btn-default"><img src="https://s1.hosted.pl:2087/cPanel_magic_revision_1458659439/images/cpanel.png" style="width: 16px;"/> cPanel</a>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Pokaż opcje</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Przedłuż serwer</a></li>
                                                <li><a href="#">FTP</a></li>
                                                <li><a href="#">Statystyki</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Dodatki</a></li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>';
        }
        
        $server .= '<div class="col-md-12"><a type="button" href="https://hosted.pl/hosting" class="btn btn-primary">Kup serwer</a></div>';
        
    }
    else
    {
        $server = '<div class="col-md-12">Nie posiadasz obecnie wykupionej żadnej usługi<br /><br /><a type="button" href="https://hosted.pl/hosting" class="btn btn-primary">Kup serwer</a>
                                        </div>';
    }

    $content->variable('servers', $server);

    /* 
        * - Orders
    */

    if(Input::get('section') == "order")
    {
        if(Input::get('do') == "newOrder")
        {
            // 
            $content->variable('opt1', $servers->getServerType(1));
             $content->variable('opt2', $servers->getServerType(2));
              $content->variable('opt3', $servers->getServerType(3));

            $content->loadTemplate('newOrder.tpl');
            $content->variable('title', 'Nowe zamówienie - '.escape($user->data()->name).' - Hosted');
            if(Input::get('option') == "buy")
            {
                $orderinfo = array();
                switch (Input::get('plan')) 
                {
                    case $servers->getServerType(1):
                        $orderinfo['price'] = $servers->getServerPrice(1);
                        $orderinfo['vato'] = $servers->getServerPrice(1) * 0.23;
                        $orderinfo['vat'] = $servers->getServerPrice(1) * 0.23 + $orderinfo['price'];
                        $orderinfo['hostingname'] = $servers->getServerType(1);
                    break;

                    case $servers->getServerType(2):
                        $orderinfo['price'] = $servers->getServerPrice(2);
                        $orderinfo['vato'] = $servers->getServerPrice(2) * 0.23;
                        $orderinfo['vat'] = $servers->getServerPrice(2) * 0.23 + $orderinfo['price'];
                        $orderinfo['hostingname'] = $servers->getServerType(2);
                    break;

                    case $servers->getServerType(3):
                        $orderinfo['price'] = $servers->getServerPrice(3);
                        $orderinfo['vato'] = $servers->getServerPrice(3) * 0.23;
                        $orderinfo['vat'] = $servers->getServerPrice(3) * 0.23 + $orderinfo['price'];
                        $orderinfo['hostingname'] = $servers->getServerType(3);
                    break;

                    default:
                     Redirect::to('servers.php?section=order&do=newOrder');

                }
                $content->variable('price', $orderinfo['price']);
                $content->variable('vato', $orderinfo['vato']);
                $content->variable('vat', $orderinfo['vat']);
                $content->variable('hostingname', $orderinfo['hostingname']);

                // Load Template to order invoice

                $content->loadTemplate('orderplan.tpl');
                
                
            }


            //TODO Final
        }
        if(Input::get('do') == 'done')
        {
            if(Input::get('action') == "payments")
            {
                $content->loadTemplate('test.tpl');
                switch (Input::get('plan')) 
                {
                    case $servers->getServerType(1):
                            $orderinfo = array('type' => 1,
                                               'plan' => 1,
                                               'price' => $servers->getServerPrice(1),
                                               'price_vat' => $servers->getServerPrice(1) * 0.23,
                                               'price_total' => $servers->getServerPrice(1) * 0.23 + $servers->getServerPrice(1)
                                               );
                    break;
                    case $servers->getServerType(2):
                            $orderinfo = array('type' => 2,
                                               'plan' => 2,
                                               'price' => $servers->getServerPrice(2),
                                               'price_vat' => $servers->getServerPrice(2) * 0.23,
                                               'price_total' => $servers->getServerPrice(2) * 0.23 + $servers->getServerPrice(2)
                                               );
                    break;
                    case $servers->getServerType(3):
                            $orderinfo = array('type' => 3,
                                               'plan' => 3,
                                               'price' => $servers->getServerPrice(3),
                                               'price_vat' => $servers->getServerPrice(3) * 0.23,
                                               'price_total' => $servers->getServerPrice(3) * 0.23 + $servers->getServerPrice(3)
                                               );
                    break;
                    default:
                     Redirect::to('servers.php');
                }
                $passwordFTP = $user->generate_password(15);
                if(Input::get('userFTP') && Input::get('domainFTP'))
                {
                    $servers->create(array(
                    'type' => $orderinfo['type'],
                    'date' => time(),
                    'expire' => time() + 2592000, // Add mc
                    'plan' => $orderinfo['plan'],
                    'owner' => $user->data()->id,
                    'status' => 0,
                    'username_ftp' => Input::get('userFTP'),
                    'domain' => Input::get('domainFTP'),
                    'password_ftp' => $passwordFTP
                    ));

                    $invoices->create(array(
                    'product_type' => $orderinfo['type'],
                    'price' => $orderinfo['price'],
                    'price_vat' => $orderinfo['price_vat'], // Add mc
                    'price_total' => $orderinfo['price_total'],
                    'owner' => $user->data()->id,
                    'date_issue' => time(),
                    'date_expire' => time() + 2592000,
                    'status' => 0
                    ));

                    $mail->SendServerInfo(escape($user->data()->email), Input::get('userFTP'), '94.75.93.158', Input::get('domainFTP'), $passwordFTP);
                    $invoice_id = $invoices->lastid();
                    Redirect::to('invoices.php?section=details&invoice='.$invoice_id);   
                }
                else
                {
                    $test = 'Musisz uzupełnić wszystkie pola formularza, stwórz serwer jeszcze raz i uzupełnij cały formularz.';
                }

                $content->variable('test', $test);


                

                
            }
        }
    }

} else {
    Redirect::to('index.php');

}


echo $content->execute();