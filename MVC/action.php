<?php

if (!empty($_POST)) {
    $acao = $_POST['data']['acao'];

    switch ($acao) {
        case 'login':

            require_once "Controller/LoginController.php";
            new LoginController();
            $validaLogin = LoginController::processa($_POST['data']['funcionario']);

            if ($validaLogin['status'] == 200) {
                if(!isset($_SESSION)){session_start();}
                
                $_SESSION['id'] = $validaLogin['id_usuario'];
                $_SESSION['nome'] = $validaLogin['nome'];

                echo json_encode(array('status' => $validaLogin['status']));
            } else {
                echo json_encode($validaLogin);
                return $validaLogin;
            }

            break;

        case 'abrir_chamado':

            require_once "Controller/ChamadoController.php";
            new ChamadoController();
            $cadastrarChamado = ChamadoController::cadastrarChamado($_POST['data']['chamado']);

            echo json_encode($cadastrarChamado);

            break;

        case 'consultar_chamado':

            $filtro = array();

            foreach ($_POST['data']['chamado'] as $chave => $valor){
                if (!empty($valor)) {
                    $filtro[$chave] = $valor;
                }
            }

            require_once "Controller/ChamadoController.php";
            new ChamadoController();
            
            $buscarChamado = ChamadoController::listarChamadosAbertos($filtro);

            require "View/ConsultarChamado/listarChamados.php";
            break;

        case 'sair':
            
            if (!isset($_SESSION)) {
                session_start();
            }

            session_destroy();
            echo json_encode(array('status' => 200));

            break;
    }
}

?>