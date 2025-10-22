<?php
    include_once '../Conectar.php';

    class Cliente
    {
        private $IdCliente;
        private $Nome;  
        private $CPF; 
        private $DataNasc; 

        public function getIdCliente() {
            return $this->IdCliente;
        }

        public function setIdCliente($IdCliente1) {
            $this->IdCliente = $IdCliente1;
        }

        public function getNome() {
            return $this->Nome;
        }

        public function setNome($name) {
            $this->Nome = $name;
        }

        public function getCPF() {
            return $this->CPF;
        }

        public function setCPF($CP) {
            $this->CPF = $CP;
        }

        public function getDataNasc() {
            return $this->DataNasc;
        }

        public function setDataNasc($data) {
            $this->DataNasc = $data;
        }

        function listar()
        {
            try
            {
                $this->conn = new Conectar();
                $sql = $this->conn->query("select * from cliente order by ID_Cliente");
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
                $sql = $this->conn->prepare("insert into cliente values (null, ?, ?, ?)");
                @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
                @$sql-> bindParam(2, $this->getCPF(), PDO::PARAM_STR);
                @$sql-> bindParam(3, $this->getDataNasc(), PDO::PARAM_STR);
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
                $sql = $this->conn->prepare("select * from cliente where nome like ?");
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
                $sql = $this->conn->prepare("delete from cliente where id_cliente = ?");
                @$sql-> bindParam(1, $this->getIdCliente(), PDO::PARAM_STR);
                if(($this->alterar() != null) && $sql->execute() == 1){
                    return "Excluido com sucesso!";
                }
                else{
                    return "Erro na exclusão! Certifique-se que colocou o ID correto";
                }
                $this->conn = null;
            }
            catch(PDOException $exc){
                echo "Erro ao excluir. " . $exc->getMessage();
            }
        }

        function alterar(){
            try{
                $this->conn = new Conectar();
                $sql = $this->conn->prepare("select * from cliente where id_cliente = ?");
                @$sql-> bindParam(1, $this->getIdCliente(), PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;
            }
            catch(PDOException $exc){
                echo "Erro ao alterar. " . $exc->getMessage();
            }
        }
        function alterar2(){
            try{
                $this->conn = new Conectar();
                $sql = $this->conn->prepare("update cliente set nome = ?, cpf = ?, data_nascimento = ? where id_cliente = ?");
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);          
                @$sql->bindParam(2, $this->getCPF(), PDO::PARAM_STR);
                @$sql->bindParam(3, $this->getDataNasc(), PDO::PARAM_STR);
                @$sql->bindParam(4, $this->getIdCliente(), PDO::PARAM_STR);
                if($sql->execute() == 1){
                    return "Registro alterado com sucesso!";
                }
                $this->conn = null;
            }
            catch(PDOException $exc){
                echo "Erro ao salvar o registro. " . $exc->getMessage();
            }
        }
    }
?>