<?php

if (!isset($_SESSION)) {
  session_start();
}

require_once __DIR__ . "/../../Controller/ChamadoController.php";
new ChamadoController();

$listarChamadosEmAberto = ChamadoController::buscarChamadosAbertos(array('id_receptor_chamado' => $_SESSION['id']));
$listarChamadosPrioridadeAltos = ChamadoController::buscarChamadosPrioridadeAlta(array('id_receptor_chamado' => $_SESSION['id']));
$listarChamadosPrioridadeMedio = ChamadoController::buscarChamadosPrioridadeMedio(array('id_receptor_chamado' => $_SESSION['id']));
$listarChamadosPrioridadeBaixo = ChamadoController::buscarChamadosPrioridadeBaixo(array('id_receptor_chamado' => $_SESSION['id']));
$listarChamadosFechados= ChamadoController::buscarChamadosFechados(array('id_receptor_chamado' => $_SESSION['id']));


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Software de Chamado Interno</title>
  <link rel="stylesheet" href="View/AberturaChamado/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div id="col d-flex" style="width: 60rem;">
        <div class="col-md-12 d-flex flex-wrap mt-5">

          <div class="col-md-4 pt-5">
            <div class="card mb-3">
              <div class="card-header"><b>Chamados em Aberto</b></div>
              <div class="card-body text-center">
                <h6 class="card-subtitle mb-2 text-muted font-weight-bold"><?php echo $listarChamadosEmAberto['chamados_abertos'];?></h6>
              </div>
            </div>
          </div>

          <div class="col-md-4 pt-5">
            <div class="card mb-3">
              <div class="card-header"><b>Chamados Prioridade Alta</b></div>
              <div class="card-body text-center">
                <h6 class="card-subtitle mb-2 text-muted font-weight-bold"><?php echo $listarChamadosPrioridadeAltos['chamados_prioridade_alta'];?></h6>
              </div>
            </div>
          </div>

          <div class="col-md-4 pt-5">
            <div class="card mb-3">
              <div class="card-header"><b>Chamados Prioridade Média</b></div>
              <div class="card-body text-center">
                <h6 class="card-subtitle mb-2 text-muted font-weight-bold"><?php echo $listarChamadosPrioridadeMedio['chamados_prioridade_medio'];?></h6>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 pt-5">
            <div class="card mb-3">
              <div class="card-header"><b>Chamados Prioridade Baixa</b></div>
              <div class="card-body text-center">
                <h6 class="card-subtitle mb-2 text-muted font-weight-bold"><?php echo $listarChamadosPrioridadeBaixo['chamados_prioridade_baixo'];?></h6>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 pt-5">
            <div class="card mb-3">
              <div class="card-header"><b>Chamados Fechados</b></div>
              <div class="card-body text-center">
                <h6 class="card-subtitle mb-2 text-muted font-weight-bold"><?php echo $listarChamadosFechados['chamados_fechados'];?></h6>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
