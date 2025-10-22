<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" type="text/CSS" href="CSS/Cadastrar.css">
</head>
<body>
        <form name="cliente" method="POST" action="" class="form">
            <h1>Dados do Cliente:</h1>
            <div class="txts">
                Nome: <br><input name="txtnome" type="text" placeholder="Nome do cliente" class="txt" required><br>
                CPF: <br><input name="txtcpf" id="cpf" type="text" maxlength="14" minlength="14" placeholder="000.000.000-00" class="txt" required><br>
                Data de Nascimento: <br><input name="txtdata" type="date" placeholder="Disciplina" class="txt" required><br>
            </div>
            <div class="btns">
                <input name="btnenviar" type="submit" value="Cadastrar">
                <input name="btnreset" type="reset" value="Apagar">
                <input type="button" onclick="location.href='../../menu/index.htm';" value="Voltar" />
            </div>
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar))
                {
                    include_once 'Cliente.php';
                    $pro=new Cliente();
                    $pro->setNome($txtnome);
                    $pro->setCPF($txtcpf);
                    $pro->setDataNasc($txtdata);
                    echo "<p class='msg'>" . $pro->salvar() . "</p>";
                }
            ?>
        </form>
    
    <div class="fundo"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        
    <script type="text/javascript">
        $("#cpf").mask("000.000.000-00");
    </script>
</body>
</html>