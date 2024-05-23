<?php
session_start();
session_unset();
session_destroy();
header("Location: \PruebaPlazas\login.html");
exit();
?>
