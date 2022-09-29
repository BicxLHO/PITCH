<?php
header("Content-type:text/html; charset=utf8");
require_once "classes/login.php";
$login = new login();

if(isset($_POST["submit"])){

    $result = $login->validarsenha();

if($result == '1'){
header('location: index.html');
}
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Health Map</title>

    <link rel="stylesheet" href="login.css">

</head>
<body>
    
<div class="login">
    <form action="logon.php" method="post" id="form">
        <a href="index.html" class="title">
        <br><br><h1 class="title">Health Map</h1><br>
    </a>
        <label>E-mail</label>
        <br>
        <input type="email" id="E-mail"></input>
        <br>
        <label>Password</label>
        <br>
        <input type="password" id="Senha"></input>
        <br><br>
        <input type="submit" id="submit">Enviar</input>
        <br><br>
        <a href="cadastro.php" class="re">Cadastrar-se</a>
        <br>
        <a href="#" class="re">Esqueci Minha Senha</a>
        
    </form>
    
</div>

</body>
</html>