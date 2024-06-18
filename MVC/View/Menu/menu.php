<?php
if(!isset($_SESSION)){session_start();}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Header</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>

        <ul class="nav" id="header" role="tablist">
            <li class="nav-item">
                <a class="text-white text-decoration-none nav-link active" id="inicio-tab" data-toggle="tab"
                    href="#inicio" aria-controls="inicio" aria-selected="true">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="text-white text-decoration-none nav-link" id="abrirChamado-tab" data-toggle="tab"
                    href="#abrirChamado" aria-controls="abrirChamado" aria-selected="false">Abrir Chamado</a>
            </li>
            <li class="nav-item">
                <a class="text-white text-decoration-none nav-link" id="consultarChamado-tab" data-toggle="tab"
                    href="#consultarChamado" aria-controls="consultarChamado" aria-selected="false">Consultar
                    Chamado</a>
            </li>
            <div class="ml-auto menu d-flex">
                <h4 class="me-3 mt-2" style="color: white;">
                    <?php echo $_SESSION['nome']; ?>
                </h4>
                <form method="POST" id="sair">
                    <input type="hidden" value="sair" name="data[acao]">
                    <button type="submit" class="botao btn btn-lg">Sair</button>
                </form>
            </div>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
                <?php include "../Inicio/inicio.php" ?>
            </div>
            <div class="tab-pane fade" id="abrirChamado" role="tabpanel" aria-labelledby="abrirChamado-tab">
                <?php include "../AbrirChamado/chamado.php" ?>
            </div>
            <div class="tab-pane fade" id="consultarChamado" role="tabpanel" aria-labelledby="consultarChamado-tab">
                <?php include "../ConsultarChamado/consultarChamado.php" ?>
            </div>
        </div>
    </header>
</body>

</html>


<script>
$("#sair").submit(function(){
    $.ajax({
        url: '../../sair',
        type: 'post',
        data: $(this).serialize(),    
        success: function(data){
            var obj = JSON.parse(data);

            console.log(data);
            if (obj.status == 200) {
                window.location.href="../../login";
                
            }
        }
    })
    return false;
}) 
</script>