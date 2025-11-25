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
        include_once 'Funcionario.php';
        $p = new Funcionario();
        $p->setId($txtcod);
        if($p->alterar() == null){
            header('location:alterar.php');
        }
        $pro_bd = $p->alterar();
    ?>
    <?php
        include_once 'Funcao.php';
        $p2 = new Funcao();
        $pro_bd2=$p2->listar();
    ?>
        <form name="cliente" method="POST" action="alterar2.php" class="form">
            <h1>Alterar</h1>
            <?php
                foreach($pro_bd as $pro_mostrar){
            ?>
            <input type="hidden" name="txtcod" value='<?php echo $pro_mostrar[0]; ?>'>
            <?php echo "<p class='id'>Id do Funcionário: " . $pro_mostrar[0] . "</p>";?>
            <div class="txts">               
                Nome do Funcionário: <br><input name="txtnome" type="text" placeholder="Nome" value="<?php echo $pro_mostrar[1]; ?>" required><br>
                CPF: <br><input name="txtcpf" type="text" placeholder="000.000.000-00" id="cpf" value="<?php echo $pro_mostrar[2]; ?>" required><br>
                Função:<br>
                <select name="selIdfunc">
                    <?php
                        echo "<option value='$pro_mostrar[3]'>Sem Alteração</option>";
                    ?>
                    <?php
                        foreach($pro_bd2 as $pro_mostrar2)
                        {              
                            echo "<option value='$pro_mostrar2[0]'>$pro_mostrar2[1]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="btns">
                <input name="btnalterar" type="submit" value="Alterar">
                <input name="btnreset" type="reset" value="Resetar">
                <input type="button" onclick="location.href='../../menu/index.htm';" value="Voltar" />
            </div>
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnalterar)){
                    include_once 'Funcionario.php';
                    $pro = new Funcionario();
                    $pro->setId($txtcod);
                    $pro->setNome($txtnome);
                    $pro->setCPF($txtcpf);
                    $pro->setIdfunc($selIdfunc);
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