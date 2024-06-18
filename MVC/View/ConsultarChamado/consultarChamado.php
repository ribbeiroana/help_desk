<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div id="col d-flex" style="width: 60rem;">
                <div class="col-md-12">
                    <h3 class="mt-5 mb-5"> Consultar Chamado </h3>
                </div>
                <form method="POST" id="formConsultarChamado" name="teste">
                    <input type="hidden" class="form-control" value="consultar_chamado" name="data[acao]">
                    <input type="hidden" class="form-control" value="<?php echo $_SESSION['id']; ?>"
                        name="data[chamado][id_receptor_chamado]">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select class="form-select" name="data[chamado][estado_atendimento]">
                                <option value="">Nível do chamado</option>
                                <option value="ALTO">Alto</option>
                                <option value="MEDIO">Médio</option>
                                <option value="BAIXO">Baixo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select class="form-select" name="data[chamado][ocorrencia]">
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
                        <div class="col-md-6 mb-3">
                            <select class="form-select" name="data[chamado][nome_cliente]">
                                <option value=""> Nome Cliente </option>
                                <option value="MATHEUS ALBERTO">Matheus Alberto</option>
                                <option value="ISIS GARDINO">Isis Gardino</option>
                                <option value="KARINE DRUMMOND">Karine Drummond</option>
                                <option value="FELIPE BATISTA">Felipe Batista</option>
                                <option value="ANA CRISTINA SILVA">Ana Cristina Silva</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                    </div>
                </form>
                <hr>
                <div class="chamados-listados">
                    <div style="height: 300px; overflow-y: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function () {

        $.ajax({
            url: '../../listar_chamados',
            type: 'GET',
            success: function (data) {
                $('.chamados-listados').html(data);
            },
            error: function () {
                alert("Erro ao carregar a página");
            }
        });

        $("#formConsultarChamado").submit(function () {
            $.ajax({
                url: '../../consultar_chamado',
                type: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    $('.chamados-listados').html(data);
                },
            })
            return false;
        })
    }) 
</script>