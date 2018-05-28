<?php
session_start();
setcookie('beget', 'tesasdasdasdat', time() + 3600);

echo "<br>Привет, ".$_COOKIE['beget']."<br>";
?>
