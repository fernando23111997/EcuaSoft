<?php

    session_start();

$_SESSION = array();

session_destroy();

//header("location: index.php");
echo'<script type="text/javascript">alert("Hata pronto");window.location.href="index.php";</script>';
exit;



?>