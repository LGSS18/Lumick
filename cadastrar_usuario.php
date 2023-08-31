<?php

    require_once('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql -> conecta();

    $login=$_POST['Login'];
    $senha=$_POST['Senha'];
    $nome=$_POST['Nome'];

    $sqlstring = "insert into users (Login, Senha, Nome, Nivel) values ('$login', '$senha','$nome', 'Cliente')";

    $query = @mysqli_query($mysql -> con, $sqlstring);

    if($query){

        echo"<script language='javascript' type='text/javascript'>
        alert('Cadastrado com sucesso!');
        window.location.href='index.php';</script>";
    }
    else
    {
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar o produto');
        window.location.href='index.php';</script>";
    }

    $mysql -> fechar();
?>