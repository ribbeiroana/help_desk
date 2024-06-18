<?php

require_once __DIR__ . "/../../Controller/FuncionarioController.php";

new FuncionarioController();
$buscarFuncionarios = FuncionarioController::buscarFuncionario();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="View/AbrirChamado/css/chamado.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div id="col d-flex" style="width: 60rem;">
                <div class="card-body">
                    <h3 class="mt-5 mb-5">Abertura de Chamados</h3>
                    <form method="POST" id="formAbrirChamado" name="teste">
                        <div class="row mb-3">
                            <input type="hidden" class="form-control" value="abrir_chamado" name="data[acao]">
                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['id']; ?>"
                                name="data[chamado][id_funcionario_solicitante]">
                            <div class="col-md-6 mb-3">
                                <select class="form-select" name="data[chamado][estado_atendimento]"
                                    required="required">
                                    <option value="">Nível do chamado</option>
                                    <option value="ALTO">Alto</option>
                                    <option value="MEDIO">Médio</option>
                                    <option value="BAIXO">Baixo</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="form-select" name="data[chamado][ocorrencia]" required="required">
                                    <option value=""> Ocorrência </option>
                                    <option value="MÁQUNA COM DEFEITO - INFRAESTRURA">Máquina com defeito -
                                        Infraestrutura</option>
                                    <option value="SISTEMA FORA DO AR - INFRAESTRURA">Sistema fora do ar -
                                        Infraestrutura</option>
                                    <option value="ERRO NO LOGIN - DESENVOLVIMENTO">Erro no login - Desenvolvimento
                                    </option>
                                    <option value="FALHA NO SISTEMA - DESENVOLVIMENTO">Falha no sistema -
                                        Desenvolvimento</option>
                                    <option value="OUTRA SITUAÇÃO">Outra situação</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="data[chamado][nome_cliente]" required="required">
                                    <option value=""> Nome Cliente </option>
                                    <option value="MATHEUS ALBERTO">Matheus Alberto</option>
                                    <option value="ISIS GARDINO">Isis Gardino</option>
                                    <option value="KARINE DRUMMOND">Karine Drummond</option>
                                    <option value="FELIPE BATISTA">Felipe Batista</option>
                                    <option value="ANA CRISTINA SILVA">Ana Cristina Silva</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="data[chamado][id_receptor_chamado]"
                                    required="required">
                                    <option value=""> Responsavel chamado </option>
                                    <?php foreach ($buscarFuncionarios as $buscarFuncionario) {
                                        ?>
                                        <option value="<?php echo $buscarFuncionario['id'] ?>">
                                            <?php echo $buscarFuncionario['nome'] . ' - ' . $buscarFuncionario['tipo_usuario'] ?>
                                        </option>
                                        <?php
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 200px;" name="data[chamado][descricao]"
                                        required></textarea>
                                    <label for="floatingTextarea2">Descreva o chamado</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="botao" name="data[chamado][situacao]" value="">
                        <div class="row justify-content-end">
                            <div class="col-md-3 text-end">
                                <button type="submit" name="data[chamado][situacao]" value="FECHADO"
                                    class="btn btn-danger">Fechar chamado</button>
                            </div>
                            <div class="col-md-3 text-end">
                                <button type="submit" name="data[chamado][situacao]" value="ABERTO"
                                    class="btn btn-primary">Salvar chamado</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="alert alert-danger mt-5 d-none" id="alert" role="alert">
                    Erro ao cadastrar chamado!
                </div>
                <div class="modal" tabindex="-1" role="dialog" id="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Aviso!</h5>
                            </div>
                            <div class="modal-body">
                                <p>Chamado Aberto com sucesso</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeDialog">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $("#formAbrirChamado").submit(function () {

        if ($(document.activeElement).val() === "FECHADO") {
            $('#botao').val('FECHADO');
        } else if ($(document.activeElement).val() === "ABERTO") {
            $('#botao').val('ABERTO');
        }

        $.ajax({
            url: '../../abrir_chamado',
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.status == 200) {
                    $('#dialog').addClass('d-block');
                } else {
                    $('#alert').removeClass('d-none');
                }
            },
        })
        return false;
    }) 

    $("#closeDialog").on('click', function(){
        window.location = "menu.php";
    })
</script>