<?
require_once __DIR__ . "/../Model/ChamadoModel.php";
class ChamadoController
{
    public static function cadastrarChamado(array $data)
    {

        new Chamado();
        $retorno = Chamado::cadastrar($data);

        if (!empty($retorno)) {
            $result = array(
                "status" => 200
            );
        } else {
            $result = array(
                "status" => 500
            );
        }

        return $result;
    }

    public static function listarChamadosAbertos(array $data)
    {
        new Chamado();
        $retorno = Chamado::listarChamado($data);

        if (!empty($retorno)) {
            $result = $retorno;
        } else {
            $result = array(
                "status" => 500
            );
        }

        return $result;
    }

    public static function buscarChamadosAbertos(array $data)
    {
        new Chamado();
        $retorno = Chamado::buscarChamadosAbertos($data);

        if (!empty($retorno)) {
            $result = $retorno[0];
        } else {
            $result['chamados_abertos'] = 'Chamados não encontrados';
        }

        return $result;
    }

    public static function buscarChamadosPrioridadeAlta(array $data)
    {
        new Chamado();
        $retorno = Chamado::buscarChamadosPrioridadeAlta($data);

        if (!empty($retorno)) {
            $result = $retorno[0];
        } else {
            $result['chamados_prioridade_alta'] = 'Chamados não encontrados';
        }

        return $result;
    }

    public static function buscarChamadosPrioridadeMedio(array $data)
    {
        new Chamado();
        $retorno = Chamado::buscarChamadosPrioridadeMedio($data);

        if (!empty($retorno)) {
            $result = $retorno[0];
        } else {
            $result['chamados_prioridade_Medio'] = 'Chamados não encontrados';
        }

        return $result;
    }

    public static function buscarChamadosPrioridadeBaixo(array $data)
    {
        new Chamado();
        $retorno = Chamado::buscarChamadosPrioridadeBaixo($data);

        if (!empty($retorno)) {
            $result = $retorno[0];
        } else {
            $result['chamados_prioridade_Baixo'] = 'Chamados não encontrados';
        }

        return $result;
    }

    public static function buscarChamadosFechados(array $data)
    {
        new Chamado();
        $retorno = Chamado::buscarChamadosFechados($data);

        if (!empty($retorno)) {
            $result = $retorno[0];
        } else {
            $result['chamados_fechados'] = 'Chamados não encontrados';
        }

        return $result;
    }
}
?>