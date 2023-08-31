<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumick</title>
</head>
<body>
    <h1>Lumick - Locadora Online</h1><hr>
    <?php
        session_start();
        if ($_SESSION['log'] != "ativo"){
                echo"<script language='javascript' type='text/javascript'>
                alert('Precisa esta logado para acessar o conteúdo');
                window.location.href='../naoentrou.php';</script>";
            }
            echo utf8_encode("<br>Bem vindo ".$_SESSION['Nome']);
            /*echo utf8_encode($_SESSION['Nome']);*/
            echo utf8_encode("<br> Que filme vamos alugar hoje?<br>");
    ?>
    <br><hr>

    <h2>O que deseja fazer?</h2>
    <form name='' action='pesquisa_filmes2.php' method='POST'>
        <a href='pesquisa_filmes2.php'>Pesquisar<br>
        <img src='imagens/iconBFilme.png' width='50px' height='50px'>
        <br>Filme</a>
    </form>
    <br>    
    <form name='' action='pesquisa_aluguel2.php' method='POST'>
        <a href='pesquisa_aluguel2.php'>Pesquisar<br>
        <img src='imagens/iconBAlugar.png' width='50px' height='50px'>
        <br>Locação</a>
    </form>

    <br><hr><br>

    <form name='' action='fechar_sessao.php' method='POST'>
        <input type='submit'  name='sair' value='logout' >
    </form>
    <br><br>

</body>
</html>