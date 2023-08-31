<?php
    require_once('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql -> conecta();

    $login=$_POST['Login'];
    $senha=$_POST['Senha'];

    $sqlstring = "select * from users where Login='$login' and Senha='$senha'";
    echo $sqlstring;
    $result = @mysqli_query($mysql->con, $sqlstring);
    $total = $result -> num_rows;

    if($total==1){
        $dados=mysqli_fetch_array($result);
        session_start();
        $_SESSION['Id']= $dados['Id'];
        $_SESSION['Nome']=$dados['Nome'];
        $_SESSION['log']= 'ativo';
        $_SESSION['Idade'] = $dados['Idade'];
        $_SESSION['Nivel']= $dados['Nivel'];
        if ($_SESSION['Nivel'] =="adm"){
            echo "<script language='javascript' type='text/javascript'>
        alert('você  esta logado');window.location.href='pagprincadm.php';
        </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
        alert('você  esta logado');window.location.href='pagprinccliente.php';
        </script>";
        }

        if ($_SESSION['Nivel'] == "adm")
        {
        $_SESSION['fundo']="lightgoldenrodyellow";
        }
        else
        {
        $_SESSION['fundo']="white";
        }

        
    }
    else {
    echo"<script language='javascript' type='text/javascript'>
    alert('senha ou login invalido');window.location.href
    ='naoentrou.php';</script>";
    }
?>