<?php

require_once "Data/Connection.php";
    class Funcionario{
        public static function buscar() {

            new Connection();
            $conn = Connection::connect();

            $sql = 'SELECT id, nome, tipo_usuario FROM funcionario WHERE situacao_usuario = "A"';
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tipo_usuario', $data['tipo_usuario'], PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
    }

?>