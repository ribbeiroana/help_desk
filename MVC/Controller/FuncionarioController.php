<?php
require_once __DIR__."/../Model/FuncionarioModel.php";

class FuncionarioController{
    public static function buscarFuncionario(){
        
        new Funcionario();
        $retorno = Funcionario::buscar();

        if(!empty($retorno)){
            $result = $retorno;
        }else{
            $result = array(
                "status" => 500,
                "msg" => "Erro ao buscar funcionários",
            );
        }

        return $result;
    }
}
?>