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

        require_once('conexao/conexao.php');

        $id = $_GET['id'];
        if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
            $id = base64_decode($_GET['id']);
        }
        else
        {
            header('Location: Cadastro.php');
        }

        $mysql = new BancodeDados();
        $mysql -> conecta();


        $sqlstring = "select * from filmes where Id='$id'";

        $query = @mysqli_query($mysql->con, $sqlstring);
        $dados = @mysqli_fetch_array($query);

        echo "ID ".$dados['Id']."</br>";
        echo "Nome <b>".$dados['Nome']."</b></br>";
        echo "Gênero <b>".$dados['Genero']."</b></br>";
        echo "Descrição <b>".$dados['Descricao']."</b></br>";
        echo "Quantidade <b>".$dados['Quantidade']."</b></br>";
        echo "Preço <b>".$dados['Preco']."</b></br>";
        echo "Classificação <b>".$dados['Classificacao']."</b></br>";
        
        $pid= $dados['Id'];

        echo $id;

        $sqlstring = "delete from filmes where id='$pid'";

        $query = @mysqli_query($mysql->con, $sqlstring);
        
        if($query){

            echo"<script language='javascript' type='text/javascript'>
            alert('Deletado com sucesso!');
            window.location.href='cadastro.php';</script>";
        }
        else
        {
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível deletar o produto');
            window.location.href='cadastro.php';</script>";
        }

        $mysql -> fechar();
    ?>
</body>
</html>