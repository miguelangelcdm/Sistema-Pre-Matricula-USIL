<?php

error_reporting(E_ALL);
ini_set('ignor_repeated_errors',TRUE);
ini_set('display_errors',FALSE);
ini_set('log_errors',TRUE);
ini_set("error_log", "/laragon/www/Matricula--WAMP/php-error.log");
error_log("INICIO WEBAPP");
?> 

<?php require 'view/header/header.php'; ?>
<hr>

<hr>

<?php require 'view/footer/footer.php';?>