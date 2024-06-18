<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . "/../../Controller/ChamadoController.php";
new ChamadoController();

$listarChamados = (isset($buscarChamado) && !empty($buscarChamado)) ? $buscarChamado : ChamadoController::listarChamadosAbertos(array('id_receptor_chamado' => $_SESSION['id']));

?>
<div style="height: 300px; overflow-y: auto;">
    <ul class="list-group">
        <?php foreach ($listarChamados as $chave => $valor) {
            $cor = null;
            if ($valor['estado_atendimento'] == 'MEDIO') {
                $cor = 'warning';
            } elseif ($valor['estado_atendimento'] == 'BAIXO') {
                $cor = 'primary';
            } elseif ($valor['estado_atendimento'] == 'ALTO') {
                $cor = 'danger';
            }
            ?>
            <li class="teste list-group-item d-flex justify-content-between align-items-center">
                <span>Número Chamado: <?php echo $valor['id']; ?></span>
                <?php echo $valor['descricao']; ?>
                <span class="badge bg-<?php echo $cor; ?> rounded-pill"><?php echo $valor['estado_atendimento']; ?></span>
            </li>
            <?php
        }
        ?>
    </ul>
</div>