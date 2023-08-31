<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumick</title>
</head>
<body>
    <?php
        session_start();
        if ($_SESSION['log'] != "ativo"){
                echo"<script language='javascript' type='text/javascript'>
                alert('Precisa esta logado para acessar o conteúdo');
                window.location.href='../naoentrou.php';</script>";
            }
            echo utf8_encode("Bem vindo ".$_SESSION['Nome']);
            /*echo utf8_encode($_SESSION['Nome']);*/
            echo utf8_encode("<br> Que filme vamos alugar hoje?");
    ?>
    <h1>Lumick - Locadora Online</h1><hr>
    <form name="cadastro" action="cadastrar_aluguel.php" method="post">
        <h2>Alugar Filme</h2>
        <p><b>Nome Cliente:</b></p><input type="text" name="fnomeclie"/>
        <p><b>Id Filme:</b></p><input type="text" name="fidfilm"/>
        <p><b>Nome Filme:</b></p><input type="text" name="fnomefilm"/>
        <p><b>Preço:</b></p><input type="text" name="fpreco"/>
        <p><b>Status:</b> Ativo</p>
           
        <br><br>
        <input type="submit" name="cadastrar" value="cadastrar"/>
    </form>

    <br>

    <form name='' action='cadastro.php' method='POST'>
        <input type="submit"  name="nova" value="Cadastrar Filmes" >
    </form>

    <br><hr><br>

    <form name='' action='pesquisa_filmes.php' method='POST'>
        <input type="submit"  name="nova" value="Filmes" >
    </form>
    <br>    
    <form name='' action='pesquisa_aluguel.php' method='POST'>
        <input type="submit"  name="nova" value="Alugueis" >
    </form>

    <br><hr><br>

    <form name='' action='fechar_sessao.php' method='POST'>
        <input type='submit'  name='sair' value='logout' >
    </form>
    <br><br>
</body>
</html>