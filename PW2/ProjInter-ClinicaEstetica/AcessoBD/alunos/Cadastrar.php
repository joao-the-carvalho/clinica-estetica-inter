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
        include_once '../cursos/Cursos.php';
        $p = new Cursos();
        $pro_bd=$p->listar();
    ?>
        <form name="cliente" method="POST" action="" class="form">
            <h1>Dados do Aluno:</h1>
            <div class="txts">
                Matrícula: <br><input name="txtmat" type="text" maxlength="5" maxlength="5" placeholder="00000" class="txt" required><br>
                Nome: <br><input name="txtnome" type="text" placeholder="Aluno" class="txt" required><br>
                Endereço: <br><input name="txtend" type="text" placeholder="Rua, Número" class="txt" required><br>
                Cidade: <br><input name="txtcid" type="text" placeholder="Cidade" class="txt" required><br>
                Disciplinas:<br>
                <select name="selcodcurso" required>
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
                    include_once 'Alunos.php';
                    $pro=new Alunos();
                    $pro->setMatricula($txtmat);
                    $pro->setNome($txtnome);
                    $pro->setEndereco($txtend);
                    $pro->setCidade($txtcid);
                    $pro->setCodcurso($selcodcurso);
                    echo "<p class='msg'>" . $pro->salvar() . "</p>";
                }
            ?>
        </form>
    
    <div class="fundo"></div>
</body>
</html>