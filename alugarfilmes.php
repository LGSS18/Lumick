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
        
        if($_SESSION['log'] != "ativo"){
            echo"<script language='javascript' type='text/javascript'>
            alert('Precisa esta logado para acessar o conteúdo');
            window.location.href='../naoentrou.php';</script>";
        }

        $unome = $_SESSION['Nome'];
        $uidade = $_SESSION['Idade'];

        
        if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
            $id = base64_decode($_GET['id']);
        }
        else
        {
            header('Location: cadastro.php');
        }

        require_once('conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql -> conecta();

        $sqlstring1 = "select * from filmes where Id='$id'";
        $query1 = @mysqli_query($mysql->con, $sqlstring1);

        if($query1)
        {   
            while($dados = mysqli_fetch_array($query1)){

            $afnome = $dados['Nome'];
            $afquant = $dados['Quantidade'];
            $afclassi = $dados['Classificacao'];
            }

                echo "<center>";
                echo "<form action='' method='POST'>";
                echo "<h2>Confira os dados do filme</h2><hr>";
                echo "<b name='ncliente' value='$unome'>Cliente: ".$unome."</b><br>";
                echo "<b name='idfilme' value='$id'>Id: ".$id."</b><br>";
                echo "<b name='nfilme' value='$afnome'>Filme: ".$afnome."</b><br>";
                echo "<b>Classificação: ".$afclassi."</b><br>";
                echo "<br><p><input type='submit' name='confirmar' value='confirmar'/>";
                echo "</form>";
                echo "<form action='pagprinccliente.php' method='POST' name='cadastroprin'>";
                echo "<input type='submit' name='voltar' value='voltar'>";
                echo "</form>";
                echo "</center>";
                
                $sqlstring2 = "insert into alugar (NomeUsuario, IdFilme, NomeFilme, Status) 
                Values ('$unome','$id','$afnome','Ativo')";
                $query2 = @mysqli_query($mysql->con, $sqlstring2);

                if($query2){

                    echo"<script language='javascript' type='text/javascript'>
                    alert('Filme alugado!');
                    window.location.href='pagprinccliente.php';</script>";
                }
                else
                {
                    echo"<script language='javascript' type='text/javascript'>
                    alert('Não foi alugar o filme');
                    window.location.href='pagprinccliente.php';</script>";
                }
        }
        else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi alugar o filme');
            window.location.href='pagprinccliente.php';</script>";
        }

        $mysql -> fechar();
        
    ?>
</body>
</html>