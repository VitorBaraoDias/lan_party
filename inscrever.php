<?php
session_start();

if (isset( $_POST ['submit2'])) {
    header("Location: exercicio2.php");
}
if (isset( $_POST ['submit3'])) {
    header("Location: exercicio3.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/styleregisto.css">
    <link rel="icon" href="images/icon_landingpage.png">
    <title>inscrever</title>
</head>

<body>
        <header class="cabecalho">
            <img id="img" src="images\icon_landingpage.png"  alt="" width="3%" height="8%">
            <nav class="cabecalho-menu" >
                <a href="index.php" class="cabecalho-menu-item">Início</a> 
                <a href="inscrever.php" class="cabecalho-menu-item">Inscrições</a>
                <a href="sobre.php" class="cabecalho-menu-item">Sobre o projeto</a>
                <a href="sair.php" class="cabecalho-menu-item" name="select" value="select" >Sair</a>

            </nav>
        </header>
    <section id="sec-titulo">
        <div class="break"></div>
        <h1 id="titulo">Inscreve-te!</h1>
    </section>
    <main>
         <section class="conteudo-principal">
            <div class="conteudo-principal-escrito">
                <form action="inscrever.php" class="form-escrever" style="height: 20%;">
                    <h2 class="form-titulo">Inscrição</h2>
                    <input type="text" class="txtNome" placeholder="Nome" required name="nome">
                    <input type="text" class="txtNumeroAluno" placeholder="Nºaluno" required name="numaluno">
                    <input type="text" class="txtEmail" placeholder="E-mail" required name="email">
                    <input type="text" class="txtSteam" placeholder="ID Steam" required name="idsteam">
                    <div class="checkbox">
                        <input type="checkbox" id="check" name="Equipa">
                        <h3 class="teste">Tenho uma Equipa</h3>
                    </div>
                    <button class="botao" style="margin-bottom: 3%;">Inscrever</button>
                </form>
            </div>

            <div class="div-img" style="margin-top: 2%;width:642px;height:448px;">

                    <img src="images/Gaming-bro.svg" class="d-block w-100" alt="..."style="width:642px;height:448px;">

            </div>
        </section>
    </main>
    <footer>
    <section class="rodape-conteudo">
        <h2 style="padding-bottom: 2px; font-family: 'Cabin', sans-serif;line-height: 61px;color:white;">Patrocinadores</h2>
        <section class="sec-img" style="padding-bottom: 2px;">
            <img src="images/is.logo.wide.png" alt="">
            <img src="images\5296499_fb_facebook_facebook logo_icon.svg" alt="" width="4%" height="8%">
            <img src="images\5296515_bird_tweet_twitter_twitter logo_icon.svg" alt="" width="4%" height="8%">
            <img src="images\5296504_forum_reddit_reddit logo_icon.svg" alt="" width="4%" height="8%">
        </section>
    </section>
</footer>
    <br>
</body>
</html>

<?php
function inscrever(){
    if (isset($_POST['nome'])){
        if (isset($_POST['numaluno'])){
            if(isset($_POST['email'])){
                if (isset($_POST['idsteam'])){
                    $dbHost= 'Localhost';
                    $dbUsername= 'root';
                    $Password= '';
                    $dbName= 'bdlan_party';
                    $conn = new mysqli($dbHost, $dbUsername, $Password,$dbName) or die ('erro');

                    $sql = 'INSERT INTO jogadores (Nome_jogadores, NumESCO, Email, Turma, Steam_ID, ID_EstadoJogador) VALUES (' . $_POST['nome'] . ',' . $_POST['numaluno'] . ',' . $_POST['email'] . ',' . $_POST['turma'] . ',' . $_POST['idsteam'] . ',)';

                    if (mysqli_query($conn, $sql)) {
                        echo "Inscrito com sucesso!";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                }
            }
        }
    }
}

function verificationEmail(){
  const APP_URL = 'http://localhost/auth'; //por resolver
    // create the activation link
    $activation_link = APP_URL . "/activate.php?email=$email&activation_code=$activation_code"; //por resolver

    // set email subject & body
    $subject = 'Confirme a sua conta';
    $message = <<<MESSAGE
            Ative a sua conta aqui ->
            $activation_link
            MESSAGE;
    // email header
    $header = "From:" . $_POST['email'];

    // send the email
    mail($_POST['email'], $subject, nl2br($message), $header);

}

if(isset($_POST['botao'])) {
    verificationEmail();
}

if (isset($_POST['Equipa'])){

}

?>
