<?php
unset($_SESSION['priv']);
session_write_close();
require'../templates/hometemp.php';
?>