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
        include_once 'Sala.php';
        $p = new Sala();
        $pro_bd=$p->listar();
    ?>
        <form name="cliente" method="POST" action="" class="form">
            <h1>Dados do Serviço:</h1>
            <div class="txts">
                Nome do Serviço: <br><input name="txtnomeserv" type="text" placeholder="Nome" class="txt" required><br>
                Descrição do Serviço: <br><input name="txtdescserv" type="text" placeholder="Descrição" class="txt" required><br>
                Duração do Serviço: <br><input name="txtduraserv" type="time" class="txt" required><br>
                Valor do Serviço: <br><input name="txtvalorserv" type="text" placeholder="Valor" class="txt" required><br>
                Sala:<br>
                <select name="selsala" required>
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
                    include_once 'Servico.php';
                    $pro=new Servico();
                    $pro->setNome($txtnomeserv);
                    $pro->setDesc($txtdescserv);
                    $pro->setDura($txtduraserv);
                    $pro->setValor($txtvalorserv);
                    $pro->setIdsala($selsala);
                    echo "<p class='msg'>" . $pro->salvar() . "</p>";
                }
            ?>
        </form>
    
    <div class="fundo"></div>
</body>
</html>