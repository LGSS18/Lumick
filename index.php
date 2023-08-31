<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css' />
    <title>Lumick - Login</title>
</head>
<body>
        <div class="box">
            <fieldset>
                <legend><b>Lumick - Locadora Online</b></legend>
                <form action="entrada.php" method="post">
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
                            <button type="submit" id="submit" name="Cadastrar" value="logar">Entrar</button>
                        </div>
                </form>
                <br>
                <hr id="linha">
                <br>
                <div>
                    <center>
                    <p class="cads">Não tem cadastro? 
                        <a href="cadastrarUsuario.php" >Cadastre-se</a></p>
                    </center>
                </div>
            </fieldset>
        </div>
</body>
</html>