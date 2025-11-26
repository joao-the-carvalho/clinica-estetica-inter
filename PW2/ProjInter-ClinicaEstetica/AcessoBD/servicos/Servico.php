<?php
    include_once '../Conectar.php';

    class Servico
    {
        private $idserv;
        private $nome;
        private $desc;
        private $dura;
        private $valor;
        private $idsala;
        private $conn;
        

        public function getIdserv() {
            return $this->idserv;
        }

        public function setIdserv($idserv1) {
            $this->idserv = $idserv1;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($name) {
            $this->nome = $name;
        }

        public function getDesc() {
            return $this->desc;
        }

        public function setDesc($desc1) {
            $this->desc = $desc1;
        }

        public function getDura() {
            return $this->dura;
        }

        public function setDura($dura1) {
            $this->dura = $dura1;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($valor1) {
            $this->valor = $valor1;
        }

        public function getIdsala() {
            return $this->idsala;
        }

        public function setIdsala($idsala1) {
            $this->idsala = $idsala1;
        }

        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from servico order by id_servico");
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