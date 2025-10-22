<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" type="text/css" href="CSS/Listar.css">
</head>
<body>
    <main>
        <?php
            $pos = 0;
            include_once 'Cliente.php';
            $p = new Cliente();
            $pro_bd=$p->listar();
        ?>
        <p>Lista da tabela 'cliente'<p>
        <table>
            <tr class="cap">
                <th>ID do Cliente</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
            </tr>
        <?php
            foreach($pro_bd as $pro_mostrar)
            {
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
        ?>
        </table>
    </main>   
    <form action="../../menu/index.htm">
        <input type="submit" value="Voltar">
    </form>
    <div class="fundo"></div>
</body>
</html>