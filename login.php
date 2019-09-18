<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

require_once 'core/init.php';

$content = new Template;

$content->loadTemplate('login.tpl');

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'email' => array('required' => true),
            'password' => array('required' => true)
        ));

        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('email'), Input::get('password'), $remember);

            if($login) {
                if(Session::exists('domains_items') && Session::exists('server_items') && Session::exists('position_items'))
                {
                    Redirect::to('invoices.php?section=dropitems');
                }
                else
                {
                    Redirect::to('invoices.php?section=dropitems');
                }
                
            } else {
                $error = "Ups... Podany identyfikator, bądź hasło jest błędne. ";
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
$content->variable('title', 'Logowanie - Hosted');
$content->variable('token', Token::generate());
$content->variable('error', Template::showError($error));
echo $content->execute();

?>
