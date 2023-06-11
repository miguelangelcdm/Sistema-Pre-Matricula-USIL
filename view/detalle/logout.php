<?php
session_start();
session_unset();
session_destroy();
header('Location: ../../index.php');
//header("Location: " . realpath($_SERVER["DOCUMENT_ROOT"]) . '/index.php');

exit();
?>
