<?php

session_start();

if ($_SESSION['log'] == "ativo"){
    $fnomeclie = $_POST['fnomeclie'];
    $fidfilm = $_POST['fidfilm'];
    $fnomefilm = $_POST['fnomefilm'];
    $fstatus = "Ativo";

    if(empty($fnomeclie)||empty($fidfilm)||empty($fnomefilm)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Tem campo em branco');
        window.location.href='index.php';</script>";
    }

    echo "<h2>Por favor verifique os dados que irão ser cadastrado</h2>";
    echo "Nome Cliente: ".$fnomeclie."</br>";
    echo "Id Filme: ".$fidfilm."</br>";
    echo "Nome Filme: ".$fnomefilm."</br>";
    echo "Status: ".$fstatus."</br>";
    

    require_once('conexao/conexao.php');

    $mysql = new BancodeDados();
    $mysql -> conecta();
    $sqlstring = "Insert Into alugar(NomeUsuario, IdFilme, NomeFilme, Status) 
    Values ('$fnomeclie', '$fidfilm', '$fnomefilm','$fstatus')";

    $query = @mysqli_query($mysql -> con, $sqlstring);

    if($query){

        echo"<script language='javascript' type='text/javascript'>
        alert('Cadastrado com sucesso!');
        window.location.href='cadastro2.php';</script>";
    }
    else
    {
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar o produto');
        window.location.href='cadastro2.php';</script>";
    }

    $mysql -> fechar();

    echo "<form name='' action='cadastro.php' method='POST'> ";
    echo "<input type='submit'  name='nova' value='Nova pesquisa' >";
    echo "</form>";
    echo "<form name='' action='fechar_sessao.php' method='POST'> ";
    echo "<input type='submit'  name='sair' value='logout' >";
    echo "</form>";

    }
else {
    echo"<script language='javascript' type='text/javascript'>
    alert('Você não estava logado, faça o login primeiro');
    window.location.href='index.php';</script>";
    }

?>