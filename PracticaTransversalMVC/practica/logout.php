<?php
include("sesiones.php");
session_destroy();
header('Location: login.php');