<?php
    include_once '../Conectar.php';

    class Alunos
    {
        private $matricula;
        private $nome;
        private $endereco;
        private $cidade;
        private $codcurso;
        private $conn;
        

        public function getMatricula() {
            return $this->matricula;
        }

        public function setMatricula($matricula1) {
            $this->matricula = $matricula1;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($name) {
            $this->nome = $name;
        }

        public function getEndereco() {
            return $this->endereco;
        }

        public function setEndereco($endereco1) {
            $this->endereco = $endereco1;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function setCidade($cidade1) {
            $this->cidade = $cidade1;
        }

        public function getCodcurso() {
            return $this->codcurso;
        }

        public function setCodcurso($codcurso1) {
            $this->codcurso = $codcurso1;
        }

        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from alunos order by matricula");
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;
            }
            catch(PDOException $exc)
            {
                echo "Erro ao executar consulta. " . $exc->getMessage();
            }
        }

        function salvar()
        {
            try
            {
                $this-> conn = new Conectar();
                $sql = $this->conn->prepare("insert into alunos values (?, ?, ?, ?, ?)");
                @$sql-> bindParam(1, $this->getMatricula(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getNome(), PDO::PARAM_STR);
                @$sql-> bindParam(3, $this->getEndereco(), PDO::PARAM_STR);
                @$sql-> bindParam(4, $this->getCidade(), PDO::PARAM_STR);
                @$sql-> bindParam(5, $this->getCodcurso(), PDO::PARAM_STR);
                if($sql->execute() == 1)
                {
                    return "Registro salvo com sucesso!";
                }
                $this->conn = null;
            }
            catch(PDOException $exc)
            {
                echo "Erro ao salvar o registro. " . $exc->getMessage();
            }
        }

        function consultar(){
            try{
                $this-> conn = new Conectar();
                $sql = $this->conn->prepare("select * from alunos where nome like ?");
                @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;
            }catch(PDOException $exc){
                echo "Erro ao executar consulta. " . $exc->getMessage();
            }
        }

        function exclusao(){
            try{
                $this-> conn = new Conectar();
                $sql = $this->conn->prepare("delete from alunos where matricula = ?");
                @$sql-> bindParam(1, $this->getMatricula(), PDO::PARAM_STR);
                if($sql->execute() == 1){
                    return "Excluido com sucesso!";
                }
                else{
                    return "Erro na exclusão!";
                }
                $this->conn = null;
            }
            catch(PDOException $exc){
                echo "Erro ao excluir. " . $exc->getMessage();
            }
        }
    }
?>