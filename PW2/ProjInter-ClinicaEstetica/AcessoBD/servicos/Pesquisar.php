<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" type="text/css" href="CSS/Pesquisar.css">
</head>
<body>    
    <form name="cliente" method="POST" action="" class="form">
        <h1>Consulta de Serviços Cadastrados</h1>
        <div class="txts">
            Nome do Serviço:<br>
            <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome">
        </div>
        <div class="btns">
            <input name="btnenviar" type="submit" value="Consultar"><br>
            <input name="limpar" type="submit" value="Limpar"><br>
            <input type="button" onclick="location.href='../../menu/index.htm';" value="Voltar">
        </div>
    </form>
    <br>
    <table>
        <tr class="cap">
            <th>ID_servico</th>
            <th>Nome_servico</th>
            <th>descricao</th>
            <th>duracao</th>
            <th>valor</th>
            <th>Num_sala</th>
        </tr>
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar)){
                $pos = 0;
                include_once 'Servico.php';
                $p = new Servico();
                $p->setNome($txtnome.'%');
                $pro_bd=$p->consultar();
                include_once 'Sala.php';
                $p2 = new Sala();
                foreach($pro_bd as $pro_mostrar){
                    $pos = $pos + 1;
                    if($pos % 2 == 1){
                        echo "<tr class='par'>"; 
                    }
                    else{
                        echo "<tr class='impar'>"; 
                    }
                                
                    echo "<td> $pro_mostrar[0] </td>"; 
                    echo "<td> $pro_mostrar[1] </td>"; 
                    echo "<td> $pro_mostrar[2] </td>"; 
                    echo "<td> $pro_mostrar[3] </td>"; 
                    echo "<td> $pro_mostrar[4] </td>"; 
                    echo "<td>".$p2->listar2($pro_mostrar[5])."</td>"; 
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <div class="fundo"></div>
</body>
</html>