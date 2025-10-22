<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
    <link rel="stylesheet" type="text/css" href="CSS/Alterar.css">
</head>
<body>
    
    <form name="cliente" method="POST" action="Alterar2.php" class="form">
        <h1>Alteração de Clientes Cadastrados</h1>
        <div class="txts">
        ID: <br><input name="txtcod" type="text" placeholder="Id do Cliente">
    </div>
        <div class="btns">
            <input name="btnenviar" type="submit" value="Consultar">
            <input name="limpar" type="reset" value="Limpar">
            <input type="button" onclick="location.href='../../menu/index.htm';" value="Voltar" />           
        </div>
    </form>  
    <div class="fundo"></div>
</body>
</html>