<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumick</title>
</head>
<body>
    <h2>Alterar filme</h2>

    <form action="" method="POST">
        <p><b>Gênero:</b></p>
            <select name="fgenero">
            <option value="Ação">Ação</option>
            <option value="Comédia">Comédia</option>
            <option value="Drama">Drama</option>
            <option value="Romance">Romance</option>
            <option value="Documentário">Documentário</option>
            <option value="Suspense">Suspense</option>
            <option value="Terror">Terror</option>
            <option value="Ficção Científica">Ficção Científica</option>
        </select>
        <p><b>Classificação:</b></p>
        <select name="fclassi">
            <option value="00">Livre</option>
            <option value="10">10 anos</option>
            <option value="12">12 anos</option>
            <option value="14">14 anos</option>
            <option value="16">16 anos</option>
            <option value="18">18 anos</option>
        </select>

        <br><p> <input type="submit" name="falterar" value="alterar">
    </form>
</body>
</html>

<?php
    session_start();
    require_once("conexao/conexao.php");

    if($_SESSION['log'] != "ativo"){
        echo"<script language='javascript' type='text/javascript'>
        alert('Precisa esta logado para acessar o conteúdo');
        window.location.href='../naoentrou.php';</script>";
    }

    if(isset($_POST["falterar"])){
        if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
            $id = base64_decode($_GET['id']);
        }
        else
        {
            header('Location: cadastro.php');
        }

        $mysql = new BancodeDados();
        $mysql -> conecta();

        $fgenero = $_POST['fgenero'];
        $fclassi = $_POST['fclassi'];

        $sqlstring = "update filmes set Genero='$fgenero', Classificacao='$fclassi' where Id='$id'";
        echo $sqlstring;

        $query = @mysqli_query($mysql -> con, $sqlstring);

        if($query){
            echo"<script language='javascript' type='text/javascript'>
            alert('Alterou com sucesso!');
            window.location.href='cadastro.php';</script>";
        }
        else
        {
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível alterar o tipo');
            window.location.href='cadastro.php';</script>";
        }

        echo $sqlstring;

        $mysql -> fechar();

    }
?>