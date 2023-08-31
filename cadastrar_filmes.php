<?php

session_start();

if ($_SESSION['log'] == "ativo"){
    $fnome = $_POST['fnome'];
    $fgenero = $_POST['fgenero'];
    $fdesc = $_POST['fdesc'];
    $fquant = $_POST['fquant'];
    $fpreco = $_POST['fpreco'];
    $fclassi = $_POST['fclassi'];
    $userid = $_SESSION['Id'];

    if(empty($fnome)||empty($fgenero)||empty($fdesc)||empty($fquant)||empty($fpreco)||empty($fclassi)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Tem campo em branco');
        window.location.href='index.php';</script>";
    }

    echo "<h2> Por favor verifique os dados que irão ser cadastrado</h2>";
    echo "Nome do filme: ".$fnome."</br>";
    echo "Gênero: ".$fgenero."</br>";
    echo "Descrição: ".$fdesc."</br>";
    echo "Quantidade: ".$fquant."</br>";
    echo "Preço: ".$fpreco."</br>";
    echo "Classificação indicativa: ".$fclassi."</br>";
    echo "Cadastrado por: ".$_SESSION['Nome'];

    require_once('conexao/conexao.php');

    $mysql = new BancodeDados();
    $mysql -> conecta();
    $sqlstring = "Insert Into filmes(Nome, Genero, Descricao, Classificacao, Quantidade, Preco, IdCadastrou) 
    Values ('$fnome', '$fgenero', '$fdesc', '$fclassi', '$fquant', '$fpreco', '$userid')";

    $query = @mysqli_query($mysql -> con, $sqlstring);

    if($query){

        echo"<script language='javascript' type='text/javascript'>
        alert('Cadastrado com sucesso!');
        window.location.href='cadastro.php';</script>";
    }
    else
    {
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar o produto');
        window.location.href='cadastro.php';</script>";
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