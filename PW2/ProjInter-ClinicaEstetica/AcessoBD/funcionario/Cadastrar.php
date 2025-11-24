<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" type="text/CSS" href="CSS/Cadastrar.css">
</head>
<body>
    <?php
        include_once 'Funcao.php';
        $p = new Funcao();
        $pro_bd=$p->listar();
    ?>
        <form name="cliente" method="POST" action="" class="form">
            <h1>Dados do Funcionario:</h1>
            <div class="txts">
                Nome do Funcionario: <br><input name="txtNome" type="text" placeholder="Nome" class="txt" required><br>
                CPF do Funcionario: <br><input name="txtCPF" type="text" id="cpf" placeholder="000.000.000-00" class="txt" maxlength="14" minlength="14" required><br>
                Função:<br>
                <select name="selIdfunc" required>
                    <option value="" selected></option>
                    <?php
                        foreach($pro_bd as $pro_mostrar)
                        {              
                            echo "<option value='$pro_mostrar[0]'>$pro_mostrar[1]</option>";
                        }
                    ?>
                </select>
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
                    include_once 'Funcionario.php';
                    $pro=new Funcionario();
                    $pro->setNome($txtNome);
                    $pro->setCPF($txtCPF);
                    $pro->setIdfunc($selIdfunc);
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