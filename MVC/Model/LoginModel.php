<?php
require_once "Data/Connection.php";

class Login {
    public static function validaLogin(array $data) {
        
        new Connection();
        $conn = Connection::connect();

        $sql = 'SELECT id, nome FROM funcionario WHERE usuario = :usuario AND senha = :senha AND tipo_usuario = :tipo_usuario AND situacao_usuario = "A"';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':senha', $data['senha'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo_usuario', $data['tipo_usuario'], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
