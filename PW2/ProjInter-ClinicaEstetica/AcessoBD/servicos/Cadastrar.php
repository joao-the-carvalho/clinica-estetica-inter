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
        include_once '../disciplinas/Disciplinas.php';
        $p = new Disciplinas();
        $pro_bd=$p->listar();
    ?>
        <form name="cliente" method="POST" action="" class="form">
            <h1>Dados do Curso:</h1>
            <div class="txts">
                Código do Curso: <br><input name="txtcodcurso" type="text" maxlength="2" minlength="2" placeholder="00" class="txt" required><br>
                Nome do Curso: <br><input name="txtnomecurso" type="text" placeholder="Curso" class="txt" required><br>
            </div>
            <p class="subt">Disciplinas:</p>
            <div class="selects">
                <select name="selcoddisc1" required>
                    <option value="" selected></option>
                    <?php
                        foreach($pro_bd as $pro_mostrar)
                        {              
                            echo "<option value='$pro_mostrar[0]'>$pro_mostrar[1]</option>";
                        }
                    ?>
                </select>
                <select name="selcoddisc2">
                    <option value="" selected></option>
                    <?php
                        foreach($pro_bd as $pro_mostrar)
                        {              
                            echo "<option value='$pro_mostrar[0]'>$pro_mostrar[1]</option>";
                        }
                    ?>
                </select>
                <select name="selcoddisc3">
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
                    include_once 'Cursos.php';
                    $pro=new Cursos();
                    $pro->setCodcurso($txtcodcurso);
                    $pro->setNome($txtnomecurso);
                    $pro->setCoddisc1($selcoddisc1);
                    $pro->setCoddisc2($selcoddisc2);
                    $pro->setCoddisc3($selcoddisc3);
                    echo "<p class='msg'>" . $pro->salvar() . "</p>";
                }
            ?>
        </form>
    
    <div class="fundo"></div>
</body>
</html>