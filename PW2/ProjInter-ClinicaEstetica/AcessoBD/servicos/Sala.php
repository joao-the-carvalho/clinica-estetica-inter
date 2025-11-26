<?php
    include_once '../Conectar.php';

    class Sala
    {
        private $idsal;
        private $numsal;
        private $capa;
        private $numuni;
        private $conn;
        

        public function getIdsal() {
            return $this->idsal;
        }

        public function setIdsal($idsala) {
            $this->idsal = $idsala;
        }

        public function getNumsal() {
            return $this->numsal;
        }

        public function setNumsal($numsala) {
            $this->numsal = $numsala;
        }

        public function getCapa() {
            return $this->capa;
        }

        public function setCapa($cap) {
            $this->capa = $cap;
        }

        public function getNumuni() {
            return $this->numuni;
        }

        public function setNumuni($numuni1) {
            $this->numuni = $numuni1;
        }
        
        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from sala order by id_sala");
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;
            }
            catch(PDOException $exc)
            {
                echo "Erro ao executar consulta. " . $exc->getMessage();
            }
        }

        function listar2($idsa)
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from sala where id_sala = $idsa");
                $sql->execute();
                $result = $sql->fetchColumn(1);
                return $result;
                $this->conn = null;
            }
            catch(PDOException $exc)
            {
                echo "Erro ao executar consulta. " . $exc->getMessage();
            }
        }
    }
?>