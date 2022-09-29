<?php
header("Content-type:text/html; charset=utf8");
require_once "classes/login.php";
$login = new login();
$msg = "";
if(isset($_POST["submit"])){

    $result = $login->inserir();

    if($result == '1'){
        header('location: index.html');
    }
    else
    {
        $msg = "Não foi possivel cadastrar usúario.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Health Map</title>

    <link rel="stylesheet" href="cadastro.css">

</head>
<body>

<div class="login">
    <form action="cadastro.php" method="post" id="form">
        
        <h1 class="title">Health Map</h1><br><br><br>
        
        <label class="input">Nome Completo</label>
        <br>
        <input type="text" id="nome" name="name" class="input"></input>
        <br>
        <label class="input">E-mail</label>
        <br>
        <input type="email" id="E-mail" name="email" class="input"></input>
        <br>
        <label class="input">Senha</label>
        <br>
        <input type="password" id="Senha" name="senha"class="input"></input>
        <br>
        <label class="input">Confirmar Senha</label>
        <br>
        <input type="password" id="Senha" class="input" name="confirma"></input>
        <br><br>
        <input type="submit" id="submit" class="input"></input>
        <br><br>
        <a href="login.php" class="re">Já Possuo Conta</a>
        <?php echo $msg; ?>
                
    </form>
    
</div>

</body>
</html>