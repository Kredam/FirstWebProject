<?php
    session_start();

    session_unset();
    session_destroy();
    header("Location: Sign.php");
    error_reporting(0);

?>