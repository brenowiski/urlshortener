<?php
session_start();

if (isset($_SESSION["auth"])) {
    header("Location: panel.php");
}

require_once("App/config.php");
$result = "";
$txtUsekey = filter_input(INPUT_POST, limparPost("txtUserkey"));

if ($txtUsekey) {
    if ($txtUsekey  == USERKEY) {
        $_SESSION["auth"] = true;
        header("Location: panel.php");
    } else {
        $result = "Senha inválida";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Encurtador</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Titillium+Web&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
    <div class="max-width bg-white padding">
    <div style="float: left; width: 500px;">
        <h1 align="left">ENCURTADOR</h1>
        <br>
</div> 
<div style="float: right; text-align: right;">
            <a href="index.php" class="link button-lr" >VOLTAR</a>   
        </div>
        <div style="clear:both;"></div>
        <form class="form" align="center" method="post" onsubmit="return Login();">
            <div class="max-width bg-white padding">
                <div style="float: left; width: 800px;"><label>Senha: <input class="input-login" type="text" name="txtUserkey" id="txtUserkey" placeholder="Digite seu usuario">
                        <button type="submit" class="input button" name="button">Login</button></label></div>

                <div style="float: left; width: 848px;">
                </div>

            </div>
        </form>
        <p align="center" id="pResult"><?php $result;?>&nbsp;</p>
    </div>
    <script src="js/script.js"></script>
</body>

</html>