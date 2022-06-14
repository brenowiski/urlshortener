<?php
require_once("App/config.php");
require_once("App/App.php");

$u = filter_input(INPUT_GET, limparPost("u"));
if($u){    
    require_once("App/App.php");

    $r = (new App())->GetUrlById($u);
    if($r==""){
        echo "URL inválida";
    }else{
        Header("Location: ". $r);
    }
    
}

$app = new App();
$listUrl = $app->ReadAll();

$txt = filter_input(INPUT_POST, limparPost("txtUrl"));
if ($txt) {
    if ($app->Write($txt)){
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Titillium+Web&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
    <div class="max-width bg-white padding">
        <div>
            <div style="float: left; width: 500px;">
                <h1 align="left">ENCURTADOR</h1>
                <p align="center">Seu novo site para encurtar links</p>
            </div>
            <div style="float: right; text-align: right;">
            <a href="login.php" class="link button-lr" >LOGIN</a><br><br>          
               
            </div>
            <div style="clear:both;"></div>
        </div>
        <br>
        <div onsubmit="return CreateURL();">
            <form id="dvForm" method="post">
                <input class="input" type="text" name="txtUrl" id="txtUrl" value="https://" placeholder="Digite sua URL aqui">
                <input class="input button bold" type="submit" name="btnCreate" value="Criar">
            </form>
            <p id="pResult">&nbsp;</p>
        </div>
        <br>
        <div id="dvTable">
            <table class="table">
                <thead>
                    <tr>                        
                        <th>URL ORIGINAL</th>
                        <th>NOVA URL</th>                        
                    </tr>
                </thead>
                <tbody>

                    <?php if ($listUrl != null) {
                        foreach ($listUrl as $l) { ?>
                            <tr>                                
                                <td><?= $l->getUrl(); ?></td>
                                <td><input class="input full-width cursor" type="text" value="<?= SITEURL . $l->getId(); ?>" onclick="Copy(this);" />
                                </td>                              
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <div>
                <div>
                    <script src="js/script.js"></script>
</body>

</html>