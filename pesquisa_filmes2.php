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
        
    <form action="" method="POST" name="">
        <h1>Busca por Gênero</h1>
        <select name="textobusca">
                <option value="">Todos</option>
                <option value="Ação">Ação</option>
                <option value="Comédia">Comédia</option>
                <option value="Drama">Drama</option>
                <option value="Romance">Romance</option>
                <option value="Documentário">Documentário</option>
                <option value="Suspense">Suspense</option>
                <option value="Terror">Terror</option>
                <option value="Ficção Científica">Ficção Científica</option>
            </select>
        <input type="submit" name="buscar" value="Buscar">
    </form>

        <?php

            require_once('conexao/conexao.php');

            $mysql = new BancodeDados();
            $mysql -> conecta();

            $idade = $_SESSION['Idade'];

            if(isset($_POST['buscar']) && !empty($_POST['textobusca'])){
                
                $pbusca = $_POST['textobusca'];
                $sqlstring = "Select * from filmes where Genero='$pbusca' and Classificacao<='$idade'";
            }
            else{
                $sqlstring = "Select * from filmes where Classificacao<='$idade' order by Genero";
            }

            $query = @mysqli_query($mysql->con, $sqlstring);

            echo "<br>";

            echo "<table border='1px'>";
            echo "<tr><th width='30px' align='center'>Id</th>
            <th width='100px'>Nome</th>
            <th width='100px'>Gênero</th>
            <th width='100px'>Descrição</th>
            <th width='100px'>Classificação</th>
            <th width='100px'>Quantidade</th>
            <th width='100px'>Preco</th>
            <th width='100px'>Alugar</th> </tr>";

            while($dados = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td align='center'>". $dados['Id']."</td>";
                echo "<td align='center'><b>". $dados['Nome']."</b></td>";
                echo "<td align='center'><b>". $dados['Genero']."</b></td>";
                echo "<td align='center'><b>". $dados['Descricao']."</b></td>";
                echo "<td align='center'><b>". $dados['Classificacao']."</b></td>";
                echo "<td align='center'><b>". $dados['Quantidade']."</b></td>";
                echo "<td align='center'><b>R$ ". $dados['Preco']."</b></td>";

                $id = base64_encode($dados['Id']);

                echo "</td> <td align='center'>
                <a href='alugarfilmes.php?id=".$id."'>
                <img src='imagens/iconAlugar.png' width='30px' height='30px'></a>";

                echo "</tr>";
            }

            echo "</table>";
            $mysql -> fechar();

        ?> 

        <br><hr>
        <form action="pagprinccliente.php" method="POST" name="cadastroprin">
        <input type="submit" name="voltar" value="voltar">
        </form>
</body>
</html>