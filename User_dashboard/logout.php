<?php
session_start();

$_SESSION = [];

session_destroy();

header('Location: ../Home/index.html');
exit();
?>
