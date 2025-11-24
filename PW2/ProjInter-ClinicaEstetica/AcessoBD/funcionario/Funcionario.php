<?php
    include_once '../Conectar.php';

    class Funcionario
    {
        private $id;
        private $nome;
        private $CPF;
        private $idfunc;
        private $conn;
        

        public function getId() {
            return $this->id;
        }

        public function setId($id1) {
            $this->id = $id1;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($name) {
            $this->nome = $name;
        }

        public function getCPF() {
            return $this->CPF;
        }

        public function setCPF($CPF1) {
            $this->CPF = $CPF1;
        }

        public function getIdfunc() {
            return $this->idfunc;
        }

        public function setIdfunc($idfuncao) {
            $this->idfunc = $idfuncao;
        }

        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from funcionario order by ID_Funcionario");
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
                $sql = $this->conn->prepare("insert into funcionario values (null, ?, ?, ?)");
                @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getCPF(), PDO::PARAM_STR);
                @$sql-> bindParam(3, $this->getIdfunc(), PDO::PARAM_STR);
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
                $sql = $this->conn->prepare("delete from funcionario where Id_Funcionario = ?");
                @$sql-> bindParam(1, $this->getId(), PDO::PARAM_STR);
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