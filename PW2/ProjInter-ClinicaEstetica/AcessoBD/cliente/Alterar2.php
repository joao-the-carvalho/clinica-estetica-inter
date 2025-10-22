<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" type="text/CSS" href="CSS/Alterar2.css">
</head>
<body>
    <?php
        @$txtcod = $_POST["txtcod"];
        include_once 'Cliente.php';
        $p = new Cliente();
        $p->setIdCliente($txtcod);
        if($p->alterar() == null){
            header('location:alterar.php');
        }
        $pro_bd = $p->alterar();
    ?>
        <form name="cliente" method="POST" action="alterar2.php" class="form">
            <h1>Alterar</h1>
            <?php
                foreach($pro_bd as $pro_mostrar){
            ?>
            <input type="hidden" name="txtcod" value='<?php echo $pro_mostrar[0]; ?>'>
            <?php echo "<p class='id'>Id do Cliente: " . $pro_mostrar[0] . "</p>";?>
            <div class="txts">               
                Nome do Cliente: <br><input name="txtnome" type="text" placeholder="Nome" value="<?php echo $pro_mostrar[1]; ?>" required><br>
                CPF: <br><input name="txtcpf" type="text" placeholder="000.000.000-00" id="cpf" value="<?php echo $pro_mostrar[2]; ?>" required><br>
                Data de Nascimento: <br><input name="txtdata" type="date" placeholder="Data" value="<?php echo $pro_mostrar[3]; ?>" required><br>
            </div>
            <div class="btns">
                <input name="btnalterar" type="submit" value="Alterar">
                <input name="btnreset" type="reset" value="Resetar">
                <input type="button" onclick="location.href='../../menu/index.htm';" value="Voltar" />
            </div>
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnalterar)){
                    include_once 'Cliente.php';
                    $pro = new Cliente();
                    $pro->setIdCliente($txtcod);
                    $pro->setNome($txtnome);
                    $pro->setCPF($txtcpf);
                    $pro->setDataNasc($txtdata);
                    echo "<p class='msg'> " . $pro->alterar2() . "</p>";
                    header('location:alterar.php');
                }
            ?>
            <?php
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