    
/* Destroy current user session */
<?php
session_start();
session_unset($_SESSION['name']);
session_destroy();
header('location: login.html');
?>