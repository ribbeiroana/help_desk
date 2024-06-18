<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela para Dividir a Tela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="View/Login/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/20aeaadbbd.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <table class="tabela">
            <tr>
                <td class="esquerdo">
                    <div class="conteudo">
                        <img src="View/Login/fotos/chamados.jpg" class="img-fluid" style="max-width: 100%;">
                    </div>
                </td>
                <td class="direito">
                    <form method="POST" id="formLogin" name="teste">
                        <div class="conteudo">
                            <div class="informacoes">
                                <div class="titulo-login">
                                    <h1>Login</h1>
                                </div>
                                <div class="select login mx-auto col-md-8 margin-select">
                                    <input type="hidden" class="form-control" value="login" name="data[acao]">
                                    <select class="form-select " aria-label="Default select example" name="data[funcionario][tipo_usuario]" required="required">
                                        <option value="">--Tipo usuario--</option>
                                        <option value="ATENDENTE">Atendente</option>
                                        <option value="INFRAESTRUTURA">Infraestrutura</option>
                                        <option value="DESENVOLVEDOR">Desenvolvedor</option>
                                    </select>
                                </div>
                                <div class="col-md-8 login mx-auto"> 
                                    <div class="input-group mb-3">
                                        <div class="icone">
                                            <i class="fa-solid fa-user input-group-prepend fa-2xl"></i>
                                        </div>
                                        <input type="text" class="form-control input-login" placeholder="Nome" name="data[funcionario][usuario]" required>
                                    </div>
                                </div>
                                <div class="col-md-8 login mx-auto"> 
                                    <div class="input-group mb-3">
                                        <div class="icone">
                                            <i class="fa-solid fa-lock input-group-prepend fa-2xl"></i>
                                        </div>
                                        <input type="password" class="form-control input-login" placeholder="Senha" name="data[funcionario][senha]" required>
                                    </div>
                                </div>
                                <div class="botao-entrar col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<script>
$("#formLogin").submit(function(){
    $.ajax({
        url: '../action.php',
        type: 'post',
        data: $(this).serialize(),    
        success: function(data){
            var obj = JSON.parse(data);

            if (obj.status == 200) {
                window.location="../View/Menu/menu.php";
            } else {
                alert(obj.msg);
            }
            console.log(obj);
        }
    })
    return false;
}) 
</script>