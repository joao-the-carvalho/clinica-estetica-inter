<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <form name="formlogin" class="formlogin" method="POST">
        <h1>Login de acesso</h1>
        <div class="txts">
            Usuario<br>
            <input type="text" name="txtlogin" minlength="1" maxlength="100" required><br>
            Senha<br>
            <input type="password" name="txtsenha" minlength="1" maxlength="100" required><br>
        </div>
        <div class="btns">
            <input type="submit" name="btnsubmit" value="Entrar">
            <input type="reset" name="btnreset" value="Apagar">
        </div>
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnsubmit)){
                include_once 'usuario.php';
                $u = new Usuario();
                $u->setLogin($txtlogin);
                $u->setSenhauser($txtsenha);
                $pro_bd = $u->logar();

                $existe = false;
                foreach($pro_bd as $pro_mostrar){
                    $existe = true;
                    echo "<p>Bem vindo!</p>";
                    echo "<p>Usuário: " . $pro_mostrar[1] . "</p>";
                    ?>
                    <input type='button' onclick="location.href = '../menu/index.htm'" value='Acessar' class="btnacessar">
                    <?php                          
                }
                if($existe == false){
                    echo "Usuário ou senha incorreto";
                }
            }
        ?>   
    </form>  
</body>
</html>