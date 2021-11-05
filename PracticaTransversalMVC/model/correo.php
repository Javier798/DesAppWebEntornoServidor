<?php
use mailer\mailer;
require 'mailer.php';
$mailer = new mailer("practicatransversal07@gmail.com","practicatransversal07@gmail.com","vesper!2021","ikerabadia999@gmail.com","Compra realizada con exito");
$mailer->enviarCorreo();
?>