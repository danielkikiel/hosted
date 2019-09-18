<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

class Mail {

    public function SendServerInfo($to = NULL, $userftp = NULL, $serverftp = NULL, $domain = NULL, $passftp = NULL)
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Hosted.pl <no-reply@hosted.pl>' . "\r\n";

        $message = "
        <html>
        <head>
        <title>Twój serwer WWW został pomyślnie zainstalowany!</title>
        </head>
        <body>
        <p>Twój serwer WWW został pomyślnie zainstalowany, poniżej znajdziesz dane dostępowe do serwera:</p>
        <table>
        <tr>
        <th>Serwer FTP</th>
        <th>Domena</th>
        <th>Użytkownik FTP</th>
        <th>Hasło FTP</th>
        </tr>
        <tr>
        <td>".$serverftp."</td>
        <td>".$domain."</td>
        <td>".$userftp."</td>
        <td>".$passftp."</td>
        </tr>
        </table><br />
        <p><u>Pamiętaj że Twój serwer będzie dostępny dopiero gdy opłacisz fakture!</u></p>
        <br /><br /><br />
        <p>Z poważaniem:</p>
        <p>Biuro obsługi klienta Hosted.pl</p>
        </body>
        </html>
        ";
        if(mail($to,'Twój serwer został zainstalowany!',$message,$headers))
        {
            return true;
        }
    }
}