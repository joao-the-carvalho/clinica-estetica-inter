<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link rel="stylesheet" type="text/css" href="CSS/Excluir.css">
</head>
<body>
    
    <form name="cliente" method="POST" action="" class="form">
        <h1>Exclusão de Alunos Cadastrados</h1>
        <div class="txts">
        ID: <br><input name="txtid" type="text" maxlength="5" minlength="5" placeholder="00000">
    </div>
        <div class="btns">
            <input name="btnenviar" type="submit" value="Excluir">
            <input name="limpar" type="reset" value="Limpar">
            <input type="button" onclick="location.href='../../menu/index.htm';" value="Voltar" />
            
        </div>
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar)){
                include_once 'Alunos.php';
                $p = new Alunos();
                $p->setMatricula($txtid);
                echo "<p class='msg'>" . $p->exclusao() . "</p>";
            }
        ?>
    </form>  
    <div class="fundo"></div>
</body>
</html>