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
$invoices = new Invoices();
$position = new Position();
$domains = new Domains();
$servers = new Server();
$mail = new Mail();

if($user->isLoggedIn()) {
    $content->loadTemplate('invoices.tpl');
    $content->variable('username', escape($user->data()->username));
    $content->variable('name', escape($user->data()->name));
    $content->variable('logouturl', 'logout.php');
    $content->variable('title', 'Faktury - '.escape($user->data()->name).' - Hosted');
    $userrole = "Klient";
    if($user->hasPermission('admin')) {
        $userrole = "Administrator";
    }
    $content->variable('role', $userrole);

    if($invoices->countInvoices($user->data()->id))
    {
        $invoicesList = '<table class="table"><thead><tr><th>Lp.</th><th>Produkt</th><th></th><th>Cena</th><th>Vat</th><th>Data wystawienia</th><th>Termin płatności</th><th>Ogółem</th><th></th></tr></thead><tbody>';

        foreach($invoices->viewInvoices($user->data()->id) as $row) 
        {

           $lp++;
           $invoicesList .= '<tr><th scope="row">'.$lp.'</th><td><a href="invoices.php?section=details&invoice='.$row->id.'" >'.$invoices->invoiceType($row->product_type).'</a></td>';
           if($row->status == 0)
           {
                $invoicesList .= '<td><span class="label label-danger">Nieopłacona</span></td>';
           }
           $invoicesList .= '<td>'.$row->price.' zł</td><td>'.$row->price_vat.' zł</td><td>'.date('d/m/y', $row->date_issue).'</td><td>'.date('d/m/y', $row->date_expire).'</td><td>'.$row->price_total.' zł</td>';
           if($row->status)
           {
                $invoicesList .= '<td><a class="btn btn-info">Opłacona</a></td></tr>';
           }
           else
           {
                $invoicesList .= '<td><a href="invoices.php?section=details&invoice='.$row->id.'" >Przejdź do faktury</a></td></tr>';
           }
        }
        $invoicesList .= '</tbody></table>';
    }
    else
    {
        $invoicesList = '<div class="col-md-12">Dla tego konta nie została jeszcze wygenerowana żadna faktura.</div>';
    }

    $content->variable('invoices', $invoicesList);

    /* ----- [ View detail invoice ] ----- */

    if(Input::get('section') == "dropitems")
    {
        if(Input::get('do') == "add")
        {

            Session::put('cart_items', 'test');
        }

        $items = "Faktury do stworzenia: <br />"; 
        if(Session::exists('domains_items') && Session::exists('server_items') && Session::exists('position_items'))
        {
            $items .= "Domeny do stworzenia: <br />"; 
            $item = Session::get('domains_items');
            foreach($item as $x => $val) {
                $items .= "Dodałem fakture za domene| ";
                $price = $invoices->addonInfo($val['type'], $val['id'], 'price_now');
                $pricevat = $price * 0.23;

                $invoices->create(array(
                        'product_type' => 4, // Domena
                        'price' => $price,
                        'price_vat' => $pricevat, 
                        'price_total' => $price+$pricevat,
                        'owner' => $user->data()->id,
                        'date_issue' => time(),
                        'date_expire' => time() + (2592000 * 12), // 12 MC 
                        'status' => 0,
                        'product_name' => $val['name']
                        ));
                $domains->create(array(
                        'type' => $val['id'], // Domena
                        'name' => $val['name'], 
                        'date_issue' => time(),
                        'date_expire' => time() + (2592000 * 1),
                        'owner' => $user->data()->id,
                        'status' => 0
                        ));


            }
            Session::delete('domains_items');
            $items .= "Serwery do stworzenia: <br />"; 
            $itemss = Session::get('server_items');
            foreach($itemss as $x => $val) {
                $items .= "Dodałem fakture za serwer| ";
                $price = $invoices->addonInfo($val['type'], $val['id'], 'price_now');
                $pricevat = $price * 0.23;

                $invoices->create(array(
                        'product_type' => $val['id'], // Domena
                        'price' => $price,
                        'price_vat' => $pricevat, 
                        'price_total' => $price+$pricevat,
                        'owner' => $user->data()->id,
                        'date_issue' => time(),
                        'date_expire' => time() + (2592000 * 1), // 12 MC 
                        'status' => 0,
                        'product_name' => $val['name']
                        ));
                $passwordFTP = $user->generate_password(8);
                $servers->create(array(
                    'type' => $val['id'],
                    'date' => time(),
                    'expire' => time() + 2592000, // Add mc
                    'plan' => $val['id'],
                    'owner' => $user->data()->id,
                    'status' => 0,
                    'username_ftp' => $user->data()->name,
                    'domain' => '',
                    'password_ftp' => $passwordFTP
                    ));

               $mail->SendServerInfo($user->data()->email, $user->data()->name, '94.75.93.158', 'Ustaw w panelu', $passwordFTP);
                

            }
            Session::delete('server_items');
            $items .= "Pozycjonowania do stworzenia: <br />"; 

            $itemp = Session::get('position_items');
            foreach($itemp as $x => $val) {

                $items .= "Dodałem fakture za pozycjonowanie| ";
                $price = $invoices->addonInfo($val['type'], $val['id'], 'price_now');
                $phrases = $invoices->addonInfo($val['type'], $val['id'], 'phrases');
                $pricevat = $price * 0.23;

                $invoices->create(array(
                        'product_type' => 5, // Domena
                        'price' => $price,
                        'price_vat' => $pricevat, 
                        'price_total' => $price+$pricevat,
                        'owner' => $user->data()->id,
                        'date_issue' => time(),
                        'date_expire' => time() + (2592000 * 1), // 12 MC 
                        'status' => 0,
                        'product_name' => $val['name']
                        ));

                $position->create(array(
                        'type' => 5, // Domena
                        'phrases' => $phrases,
                        'owner' => $user->data()->id,
                        'status' => 0,
                        'date_issue' => time(),
                        'date_expire' => time() + (2592000 * 1), // 12 MC 
                        'mother' => 0
                        ));
            }
            Session::delete('position_items');
            
            
        }

        $content->variable('test', $items);
        
        Redirect::to('invoices.php');
        $content->loadTemplate('test.tpl');
    }

    /*if(Input::get('section') == "create")
    {
        if(Input::get('type') && Input::get('monthly'))
        {

                $monthly = intval(Input::get('monthly'));
                $type = intval(Input::get('type'));


                $price = 10 * $monthly;
                $pricevat = $price * 0.23;
                $pricetotal = $price + $pricevat;
               

                $invoices->create(array(
                        'product_type' => $type,
                        'price' => $price,
                        'price_vat' => $pricevat, // Add mc
                        'price_total' => $pricetotal,
                        'owner' => $user->data()->id,
                        'date_issue' => time(),
                        'date_expire' => time() + (2592000 * $monthly),
                        'status' => 0
                        ));

                

                #Redirect::to('invoices.php');
        }
            OFF
    }*/


    if(Input::get('section') == "test")
    {
             #  $servers->update(array('status' => 1), 3);
        #$content->variable('test', $user->addInfoUser(array('Imie'=>"chuj")));
        $test = $mail->SendServerInfo('kiklus95@gmail.com', 'Test', 'test', 'test.pl', 'test');

        $content->variable('test', $test);
        $content->loadTemplate('test.tpl');
    }

    if(Input::get('section') == "details")
    {
        $invoice_id = intval(Input::get('invoice'));
        if($invoices->find($invoice_id))
        {
            $invoice_info = $invoices->viewInvoice($invoice_id);

            $content->variable('hostingname', $invoices->invoiceType($invoice_info->product_type));
            $content->variable('price', $invoice_info->price);
            $content->variable('vat', $invoice_info->price_total);
            $content->variable('vato', $invoice_info->price_vat);
            $content->variable('invoiceid', $invoice_info->id);
            $content->variable('surname', $user->infoUser('user-surname'));
            $content->variable('user-zip', $user->infoUser('user-zip'));
            $content->variable('user-city', $user->infoUser('user-city'));
            $content->variable('user-adresess', $user->infoUser('user-adresess'));

            $monthly = round(($invoice_info->date_expire - $invoice_info->date_issue) / 2592000);

            $content->variable('monthly', $monthly);
            

            $id = "24681";
            $kod = "30f1XVH6wtDhIb4n";
            $md5sum = md5($id.$invoice_info->price_total.$invoice_info->id.$kod);


            $invoice_tpay_system = '<form action="https://secure.tpay.com" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id" value="'.$id.'">
                                    <input type="hidden" name="kwota" value="'.$invoice_info->price_total.'">
                                    <input type="hidden" name="opis" value="'.$invoices->invoiceType($invoice_info->product_type).'">
                                    <input type="hidden" name="crc" value="'.$invoice_info->id.'">
                                    <input type="hidden" name="pow_url" value="http://hosted.uxy.pl/invoices.php?section=details&invoice='.$invoice_info->id.'&do=pay">
                                    <input type="hidden" name="pow_url_blad" value="http://hosted.uxy.pl/TEST/examples/test.php">
                                    <input type="hidden" name="wyn_url" value="http://hosted.uxy.pl/api.php">
                                    <input type="hidden" name="md5sum" value="'.$md5sum.'">
                                    <a href="index.php" class="btn btn-default">Anuluj</a> 
                                    <input type="submit" class="btn btn-primary" value="Przejdź do płatności">
                                    </form>';

            if($invoice_info->status)
            {
                $invoice_tpay_system = '<input type="submit" class="btn btn-primary" value="Opłacona">';
            }

            $content->variable('invoice-system', $invoice_tpay_system);

            $content->loadTemplate('invoicepay.tpl');

            if(Input::get('do') == "pay")
            {
             #  $servers->update(array('status' => 1), 3);
                $content->loadTemplate('invoicesuccess.tpl');
            }

        }
        else
        {
            Redirect::to('invoices.php');
        }

    }
    

} else {
    Redirect::to('index.php');
}


echo $content->execute();