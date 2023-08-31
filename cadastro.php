<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='styleadm.css' />
    <title>Lumick</title>
</head>
<body>
<div class="box">
            <fieldset>
                <legend>Lumick - Locadora Online</legend>
    <?php
        session_start();
        if ($_SESSION['log'] != "ativo"){
                echo"<script language='javascript' type='text/javascript'>
                alert('Precisa esta logado para acessar o conteúdo');
                window.location.href='../naoentrou.php';</script>";
            }
    ?>
    <br>

<hr id="linha">
    
<nav>
    <center>
        <fieldset>   
        <legend>Cadastrar</legend>
        <div>
    <form name="cadastro" action="cadastrar_filmes.php" method="post">
        <br><br>
        <div>
        <input required class="inputuser" type="text" name="fnome"/>
        <label class="labelinput">Nome:</label>
        </div>
        <br><br>
        <div>
            <select name="fgenero" required class="inputselect">
                <option value="" data-default disabled selected></option>
                <option value="Ação">Ação</option>
                <option value="Comédia">Comédia</option>
                <option value="Drama">Drama</option>
                <option value="Romance">Romance</option>
                <option value="Documentário">Documentário</option>
                <option value="Suspense">Suspense</option>
                <option value="Terror">Terror</option>
                <option value="Ficção Científica">Ficção Científica</option>
            </select>
            <label class="labelinput">Gênero:</label>
        </div>
        <br><br>
        <div>
        <input required class="inputuser" type="text" name="fdesc"/>
        <label class="labelinput">Descrição:</label>
        </div>
        <br><br>
        <div>
        <input required class="inputuser" type="text" name="fquant"/>
        <label class="labelinput">Quantidade:</label>
        </div>
        <br><br>
        <div>
        <input required class="inputuser" type="text" name="fpreco"/>
        <label class="labelinput">Preço:</label>
        </div>
        <br><br>
        <div>
        
            <select name="fclassi" required class="inputselect">
            <option value="" data-default disabled selected></option>
                <option value="00">Livre</option>
                <option value="10">10 anos</option>
                <option value="12">12 anos</option>
                <option value="14">14 anos</option>
                <option value="16">16 anos</option>
                <option value="18">18 anos</option>
            </select>
            <label class="labelinput">Classificação:</label>
            </div>
        <br><br>
        <div>
        <button id="submit" type="submit" name="cadastrar" value="cadastrar">Cadastrar</button>
        </div>
    </form>
        </div>
        </fieldset>

    <br><hr><br>
    <div>
    <form name='' action='pagprincadm.php' method='POST'>
        <button type="submit" id='submit'  name='sair' value='voltar' >Voltar</button>
    </form>
        </div>
        <br>
    
        </fieldset>  
</body>
</html>