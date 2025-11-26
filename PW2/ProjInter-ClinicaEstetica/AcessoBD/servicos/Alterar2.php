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
        include_once 'Servico.php';
        $p = new Servico();
        $p->setIdserv($txtcod);
        if($p->alterar() == null){
            header('location:alterar.php');
        }
        $pro_bd = $p->alterar();
    ?>
    <?php
        include_once 'Sala.php';
        $p2 = new Sala();
        $pro_bd2=$p2->listar();
    ?>
        <form name="cliente" method="POST" action="alterar2.php" class="form">
            <h1>Alterar</h1>
            <?php
                foreach($pro_bd as $pro_mostrar){
            ?>
            <input type="hidden" name="txtcod" value='<?php echo $pro_mostrar[0]; ?>'>
            <?php echo "<p class='id'>Id do Serviço: " . $pro_mostrar[0] . "</p>";?>
            <div class="txts">               
                Nome do Serviço: <br><input name="txtnomeserv" type="text" placeholder="Nome" class="txt" value="<?php echo $pro_mostrar[1]; ?>" required><br>
                Descrição do Serviço: <br><input name="txtdescserv" type="text" placeholder="Descrição" class="txt" value="<?php echo $pro_mostrar[2]; ?>" required><br>
                Duração do Serviço: <br><input name="txtduraserv" type="time" class="txt" value="<?php echo $pro_mostrar[3]; ?>" required><br>
                Valor do Serviço: <br><input name="txtvalorserv" type="text" placeholder="Valor" class="txt" value="<?php echo $pro_mostrar[4]; ?>" required><br>
                Sala:<br>
                <select name="selsala" required>
                    <?php
                        echo "<option value='$pro_mostrar[5]'>Sem Alteração</option>";
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
                    include_once 'Servico.php';
                    $pro = new Servico();
                    $pro->setNome($txtnomeserv);
                    $pro->setDesc($txtdescserv);
                    $pro->setDura($txtduraserv);
                    $pro->setValor($txtvalorserv);
                    $pro->setIdsala($selsala);
                    $pro->setIdserv($txtcod);
                    echo "<p class='msg'> " . $pro->alterar2() . "</p>";
                    header('location:alterar.php');
                }
            ?>
            <?php
                }
            ?> 
        </form>
    
    <div class="fundo"></div>
</body>
</html>