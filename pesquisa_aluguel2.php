<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumick - Filmes</title>
</head>
<body>
    <?php
        session_start();
    
        if($_SESSION['log'] != "ativo"){
            echo"<script language='javascript' type='text/javascript'>
            alert('Precisa esta logado para acessar o conteúdo');
            window.location.href='../naoentrou.php';</script>";
        }
    ?>

    <h1> Lista dos filmes </h1>
    <h3> Verificação do conteúdo </h3>
    <hr>

        <?php
            require_once('conexao/conexao.php');

            $mysql = new BancodeDados();
            $mysql -> conecta();
            $pbusca = $_SESSION['Nome'];

            $sqlstring = "select * from alugar where Status <> 'Oculto' and  NomeUsuario='$pbusca'";

            $query = @mysqli_query($mysql->con, $sqlstring);

            echo "<br>";

            echo "<table border='1px'>";
            echo "<tr><th width='30px' align='center'>Id</th>
            <th width='100px'>Nome Cliente</th>
            <th width='100px'>Nome Filme</th>
            <th width='100px'>Status</th></tr>";

            while($dados = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td align='center'>". $dados['Id']."</td>";
                echo "<td align='center'><b>". $dados['NomeUsuario']."</b></td>";
                echo "<td align='center'><b>". $dados['NomeFilme']."</b></td>";
                echo "<td align='center'><b>". $dados['Status']."</b></td>";

                echo "</tr>";
            }

            echo "</table>";
            $mysql -> fechar();

        ?> 

        <br><hr>
        <form action="cadastro2.php" method="POST" name="cadastroprin">
        <input type="submit" name="voltar" value="voltar">
    </form>
</body>
</html>