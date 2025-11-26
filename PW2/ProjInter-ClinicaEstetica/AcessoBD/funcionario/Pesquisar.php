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
        <h1>Consulta de Funcionários Cadastrados</h1>
        <div class="txts">
            Nome:<br>
            <input name="txtnome" type="text" size="40" maxlength="100" placeholder="Nome do Funcionário">
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
            <th>ID_Funcionario</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Funcao</th>
        </tr>
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar)){
                $pos = 0;
                include_once 'Funcionario.php';
                $p = new Funcionario();
                $p->setNome($txtnome.'%');
                $pro_bd=$p->consultar();
                include_once 'Funcao.php';
                $p2 = new Funcao();
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
                    echo "<td>". $p2->listar2($pro_mostrar[3]) ."</td>"; 
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <div class="fundo"></div>
</body>
</html>