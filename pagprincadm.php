<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='styleadm.css' />
    <title>Lumick</title>
</head>
<body>
<div class="box">
            <fieldset>
                <legend><b>Lumick - Locadora Online</b></legend>
    <?php
        session_start();
        if ($_SESSION['log'] != "ativo"){
                echo"<script language='javascript' type='text/javascript'>
                alert('Precisa esta logado para acessar o conteúdo');
                window.location.href='../naoentrou.php';</script>";
            }
            echo "<center>";
            echo utf8_encode("<br><p>Bem vindo ".$_SESSION['Nome'].", ");
            echo "o que você deseja fazer?</p>";
            echo "</center>";
    ?>
    
<br>

<hr id="linha">
    
<nav>
    <center>
        <fieldset>   
            <legend>Cadastrar</legend>
            <div>
                <form name="cadastro" action="cadastro.php" method="post">
                    <button type="submit" class="submit2"><img src='imagens/iconFilme.png'>
                    <br>Filme</button>
                </form>
            </div>
            <div> 
                <form name="cadastro" action="cadastro2.php" method="post">
                    <button type="submit" class="submit2"><img src='imagens/iconAlugar.png'>
                    <br>Locação</button></button>
                </form>
            </div>
        </fieldset> 
    </center>
</nav>
<br>
<hr id="linha">
<nav>
    <center>
        <fieldset>   
            <legend>Pesquisar</legend>
            <div>
                <form name='' action='pesquisa_filmes.php' method='POST'>
                    <button type="submit" class="submit2">
                    <img src='imagens/iconBFilme.png' width='50px' height='50px'>
                    <br>Filme</button>
                </form>
            </div>
            <div> 
                <form name='' action='pesquisa_aluguel.php' method='POST'>
                    <button type="submit" class="submit2">
                    <img src='imagens/iconBAlugar.png' width='50px' height='50px'>
                    <br>Locação</button>
                </form>
            </div>
        </fieldset>
    </center>
</nav>

<br><hr><br>

<form name='' action='fechar_sessao.php' method='POST'>
<button type="submit" id="submit" name="sair">Lougout</button>

</form>
<br>
</div>
</fieldset>
</div>
</body>
</html>