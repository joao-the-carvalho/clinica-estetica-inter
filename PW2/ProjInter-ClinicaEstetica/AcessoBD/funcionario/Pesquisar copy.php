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
        <h1>Consulta de Clientes Cadastrados</h1>
        <div class="txts">
            Nome:<br>
            <input name="txtnome" type="text" size="40" maxlength="100" placeholder="Nome do Cliente">
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
            <th>ID do Cliente</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
        </tr>
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar)){
                $pos = 0;
                include_once 'Cliente.php';
                $p = new Cliente();
                $p->setNome($txtnome.'%');
                $pro_bd=$p->consultar();
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
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <div class="fundo"></div>
</body>
</html>