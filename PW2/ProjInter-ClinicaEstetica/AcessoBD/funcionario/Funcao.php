<?php
    include_once '../Conectar.php';

    class Funcao
    {
        private $idfuncao;
        private $tipo;
        private $conn;
        

        public function getIdfuncao() {
            return $this->idfuncao;
        }

        public function setIdfuncao($idfunc) {
            $this->idfuncao = $idfunc;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tip) {
            $this->tipo = $tip;
        }

        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from funcao order by ID_funcao");
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;
            }
            catch(PDOException $exc)
            {
                echo "Erro ao executar consulta. " . $exc->getMessage();
            }
        }

        function listar2($idfun)
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from funcao where id_funcao = $idfun");
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