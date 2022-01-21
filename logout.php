<?php

setcookie('nome', '', time() - 3600);

header("Location: login.php");
exit;

?>