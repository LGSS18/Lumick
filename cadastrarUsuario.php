<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css' />
    <title>Lumick - Cadastro</title>
</head>
<body>
    
    <div class="box">
            <fieldset>
            <legend><b>Lumick - Locadora Online</b></legend>
    
                <form action="cadastrar_usuario.php" method="POST">
                        <br><br>
                        <div>
                            <input type="text" name="Login" id="Login" required class="inputuser">
                            <label class="labelinput">Login</label>
                        </div>
                        <br><br>
                        <div>
                            <input type="password" name="Senha" id="Senha" required class="inputuser">
                            <label class="labelinput">Senha</label>
                        </div>
                        <br><br>
                        <div>
                            <input type="text" name="Nome" id="Nome" required class="inputuser">
                            <label class="labelinput">Nome</label>
                        </div>
                        <br><br>
                        <button type="submit" id="submit" name="cadastrar" value="cadastrar">Finalizar Cadastro</button>
                </form>
                <br>
                <hr id="linha">
                <br>
                <form action="index.php" method="POST" name="login">    
                    <button type="submit" id="submit" name="voltar">Voltar</button>
                </form>
            </fieldset>
    </div>
</body>
</html>