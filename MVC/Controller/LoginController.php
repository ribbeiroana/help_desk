<?php
require_once __DIR__."../../Model/LoginModel.php";
class LoginController{
    public static function processa($data){

        new Login();
        $retorno = Login::validaLogin($data);

        if(!empty($retorno)){

            $result = array(
                "status" => 200,
                "id_usuario" => $retorno['id'],
                "nome" => $retorno['nome']
            );
        }else{
            $result = array(
                "status" => 500,
                "msg" => "Erro ao logar!",
            );
        }

        return $result;
    }
}
?>