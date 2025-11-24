<?php
    include_once '../Conectar.php';

    class Cursos
    {
        private $codcurso;
        private $nome;
        private $coddisc1;
        private $coddisc2;
        private $coddisc3;
        private $conn;
        

        public function getCodcurso() {
            return $this->codcurso;
        }

        public function setCodcurso($codcurso1) {
            $this->codcurso = $codcurso1;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($name) {
            $this->nome = $name;
        }

        public function getCoddisc1() {
            return $this->coddisc1;
        }

        public function setCoddisc1($coddisc11) {
            $this->coddisc1 = $coddisc11;
        }

        public function getCoddisc2() {
            return $this->coddisc2;
        }

        public function setCoddisc2($coddisc21) {
            $this->coddisc2 = $coddisc21;
        }

        public function getCoddisc3() {
            return $this->coddisc3;
        }

        public function setCoddisc3($coddisc31) {
            $this->coddisc3 = $coddisc31;
        }

        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from cursos order by codcurso");
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
                $sql = $this->conn->prepare("insert into cursos values (?, ?, ?, ?, ?)");
                @$sql-> bindParam(1, $this->getCodcurso(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getNome(), PDO::PARAM_STR);
                @$sql-> bindParam(3, $this->getCoddisc1(), PDO::PARAM_STR);
                @$sql-> bindParam(4, $this->getCoddisc2(), PDO::PARAM_STR);
                @$sql-> bindParam(5, $this->getCoddisc3(), PDO::PARAM_STR);
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
                $sql = $this->conn->prepare("select * from cursos where nome like ?");
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
                $sql = $this->conn->prepare("delete from cursos where codcurso = ?");
                @$sql-> bindParam(1, $this->getCodcurso(), PDO::PARAM_STR);
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