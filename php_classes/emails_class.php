<?php
    class emails{
        public static function recover_password($email,$hash){
            $from = "no-reply@moldaviawar.com";
            $headers = "" .
            "Reply-To:" . $from . "\r\n" .
            "From:" . $from . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $subject = "Recuperare parola to MoldaviaAtWar";
            $message = "<html><head></head><body>";
            $message .= "<p>Apasati pe linkul de mai jos pentru a modifica parola!</p>\n";
            $message .= "</body></html>";
            mail($email,$subject,$message,$headers);
        }
    }
?>