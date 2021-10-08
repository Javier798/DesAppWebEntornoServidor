<?php
use mailer\mailer;
require 'mailer.php';
$mailer = new mailer("javiermarin798@gmail.com","javiermarin798@gmail.com","passwod","ikerabadia999@gmail.com","C:/xampp/htdocs/dwes/librerias/Resultado practica 2.pdf");
$mailer->enviarCorreo();
?>