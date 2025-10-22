const form = document.getElementById("formulario");
const tit = document.getElementById("titulo");
const dis = document.getElementById("disciplinas");
const cur = document.getElementById("cursos");
const alu = document.getElementById("alunos");
const bcadastrar = document.getElementById("cad");
const bexcluir = document.getElementById("exc");
const bpesquisar = document.getElementById("pes");
const blistar = document.getElementById("lis");
const balterar = document.getElementById("alt");
function cadastrar(){
    if(tit.textContent != "Cadastrar"){
        form.classList.remove("conteudo");
        form.classList.add("conteudoh");
        setTimeout(function(){
            tit.textContent = "Cadastrar";
            dis.href = "../AcessoBD/cliente/Cadastrar.php";
            cur.href = "../AcessoBD/cursos/Cadastrar.php";
            alu.href = "../AcessoBD/alunos/Cadastrar.php";
            form.classList.remove("conteudoh");
            form.classList.add("conteudo");
        }, 500);
        bcadastrar.classList.add("selected");
        bexcluir.classList.remove("selected");
        bpesquisar.classList.remove("selected");
        blistar.classList.remove("selected");
        balterar.classList.remove("selected");
    }
}

function excluir(){
    if(tit.textContent != "Excluir"){
        form.classList.remove("conteudo");
        form.classList.add("conteudoh");
        setTimeout(function(){
            tit.textContent = "Excluir";
            dis.href = "../AcessoBD/cliente/Excluir.php";
            cur.href = "../AcessoBD/cursos/Excluir.php";
            alu.href = "../AcessoBD/alunos/Excluir.php";
            form.classList.remove("conteudoh");
            form.classList.add("conteudo");
        }, 500);
        bcadastrar.classList.remove("selected");
        bexcluir.classList.add("selected");
        bpesquisar.classList.remove("selected");
        blistar.classList.remove("selected");
        balterar.classList.remove("selected");
    }
}

function pesquisar(){
    if(tit.textContent != "Pesquisar"){
        form.classList.remove("conteudo");
        form.classList.add("conteudoh");
        setTimeout(function(){
            tit.textContent = "Pesquisar";
            dis.href = "../AcessoBD/cliente/Pesquisar.php";
            cur.href = "../AcessoBD/cursos/Pesquisar.php";
            alu.href = "../AcessoBD/alunos/Pesquisar.php";
            form.classList.remove("conteudoh");
            form.classList.add("conteudo");
        }, 500);
        bcadastrar.classList.remove("selected");
        bexcluir.classList.remove("selected");
        bpesquisar.classList.add("selected");
        blistar.classList.remove("selected");
        balterar.classList.remove("selected");
    }
}

function listar(){
    if(tit.textContent != "Listar"){
        form.classList.remove("conteudo");
        form.classList.add("conteudoh");
        setTimeout(function(){
            tit.textContent = "Listar";
            dis.href = "../AcessoBD/cliente/Listar.php";
            cur.href = "../AcessoBD/cursos/Listar.php";
            alu.href = "../AcessoBD/alunos/Listar.php";
            form.classList.remove("conteudoh");
            form.classList.add("conteudo");
        }, 500);
        bcadastrar.classList.remove("selected");
        bexcluir.classList.remove("selected");
        bpesquisar.classList.remove("selected");
        blistar.classList.add("selected");
        balterar.classList.remove("selected");
    }
}

function alterar(){
    if(tit.textContent != "Alterar"){
        form.classList.remove("conteudo");
        form.classList.add("conteudoh");
        setTimeout(function(){
            tit.textContent = "Alterar";
            dis.href = "../AcessoBD/cliente/Alterar.php";
            cur.href = "../../Aviso/index.htm";
            alu.href = "../../Aviso/index.htm";
            form.classList.remove("conteudoh");
            form.classList.add("conteudo");
        }, 500);
        bcadastrar.classList.remove("selected");
        bexcluir.classList.remove("selected");
        bpesquisar.classList.remove("selected");
        blistar.classList.remove("selected");
        balterar.classList.add("selected");
    }
}