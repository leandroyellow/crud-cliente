<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/style.css">
   <title>Login</title>
</head>
<body>
   
      <h1>Login</h1>
      <form action="verifica.php" method="post">
         <label for="login">login:</label>
         <input type="text" name="login" id="login">
         <label for="password">Senha:</label>
         <input type="password" name="password" id="password">
         <div><button>Enviar</button></div>
      </form>
   
</body>
</html>