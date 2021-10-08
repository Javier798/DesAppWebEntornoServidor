<?php
namespace mailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
    class mailer{
        private $emisor;
        private $receptor;
        private $contraseña;
        private $receptorCC;
        private $documento;
        private $mail;
        function __construct($emisor, $receptor,$contraseña,$receptorCC,$documento)
        {
            $this->mail = new PHPMailer(true);    
            $this->emisor=$emisor;
            $this->receptor=$receptor;
            $this->receptorCC=$receptorCC;
            $this->contraseña=$contraseña;
            $this->documento=$documento;
        }
        
function enviarCorreo(){
    try {
        //Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $this->emisor;                    //SMTP username
        $this->mail->Password   = $this->contraseña;                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $this->mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $this->mail->setFrom($this->receptor, 'Mailer');
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $this->mail->addAddress($this->receptor);               //Name is optional
       // $mail->addReplyTo('info@example.com', 'Information');
        $this->mail->addCC($this->receptorCC);
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        $this->mail->addAttachment($this->documento);         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $this->mail->isHTML(true);                                  //Set email format to HTML
        $this->mail->Subject = 'Here is the subject';
        $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $this->mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
    }
        }
}

?>