<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumick</title>
</head>
<body>
    <h2>Alterar aluguel</h2>

    <form action="" method="POST">
        <p><b>Status:</b></p>
            <select name="faluguel">
            <option value="Ativo">Ativo</option>
            <option value="Concluido">Concluído</option>
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

        $faluguel = $_POST['faluguel'];

        $sqlstring = "update alugar set Status='$faluguel' where Id='$id'";
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