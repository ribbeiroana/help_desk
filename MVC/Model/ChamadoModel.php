<?php
require_once "Data/Connection.php";

class Chamado
{
    public static function cadastrar(array $data)
    {
        $date = new DateTime();
        $dataAtual = $date->format('Y-m-d H:i:s');

        $dataFechamento = null;
        if ($data['situacao'] == 'FECHADO') {
            $dataFechamento = $date->format('Y-m-d H:i:s');
        }

        $conn = Connection::connect();

        $sql = 'INSERT INTO chamado (descricao, data_abertura, data_conclusao, situacao, estado_atendimento, tipo_atendimento, nome_cliente, id_funcionario_solicitante, id_receptor_chamado)
                VALUES (:descricao, :data_abertura, :data_conclusao, :situacao, :estado_atendimento, :tipo_atendimento, :nome_cliente, :id_funcionario_solicitante, :id_receptor_chamado)';

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':descricao', $data['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(':data_abertura', $dataAtual, PDO::PARAM_STR);
        $stmt->bindParam(':data_conclusao', $dataFechamento, PDO::PARAM_STR);
        $stmt->bindParam(':situacao', $data['situacao'], PDO::PARAM_STR);
        $stmt->bindParam(':estado_atendimento', $data['estado_atendimento'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo_atendimento', $data['ocorrencia'], PDO::PARAM_STR);
        $stmt->bindParam(':nome_cliente', $data['nome_cliente'], PDO::PARAM_STR);
        $stmt->bindParam(':id_funcionario_solicitante', $data['id_funcionario_solicitante'], PDO::PARAM_INT);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public static function listarChamado(array $data)
    {
        $sql = 'SELECT id, descricao, estado_atendimento FROM chamado WHERE situacao = "ABERTO" AND id_receptor_chamado = :id_receptor_chamado';

        $sql .= !empty($data['estado_atendimento']) ? ' AND estado_atendimento = "'.$data['estado_atendimento'].'"' : '';
        $sql .= !empty($data['ocorrencia']) ? ' AND tipo_atendimento = "'.$data['ocorrencia'].'"' : '';
        $sql .= !empty($data['nome_cliente']) ?' AND nome_cliente = "'.$data['nome_cliente'].'"' : '';
        $sql .= ' ORDER BY data_abertura DESC';

        $conn = Connection::connect();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function buscarChamadosAbertos(array $data)
    {
        $sql = 'SELECT COUNT(id) AS chamados_abertos FROM chamado WHERE situacao = "ABERTO" AND id_receptor_chamado = :id_receptor_chamado';
        
        $conn = Connection::connect();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function buscarChamadosPrioridadeAlta(array $data)
    {
        $sql = 'SELECT COUNT(id) AS chamados_prioridade_alta FROM chamado WHERE situacao = "ABERTO" AND id_receptor_chamado = :id_receptor_chamado AND estado_atendimento = "ALTO"';
                
        $conn = Connection::connect();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function buscarChamadosPrioridadeMedio(array $data)
    {
        $sql = 'SELECT COUNT(id) AS chamados_prioridade_medio FROM chamado WHERE situacao = "ABERTO" AND id_receptor_chamado = :id_receptor_chamado AND estado_atendimento = "MEDIO"';
                
        $conn = Connection::connect();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function buscarChamadosPrioridadeBaixo(array $data)
    {
        $sql = 'SELECT COUNT(id) AS chamados_prioridade_baixo FROM chamado WHERE situacao = "ABERTO" AND id_receptor_chamado = :id_receptor_chamado AND estado_atendimento = "BAIXO"';
                
        $conn = Connection::connect();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function buscarChamadosFechados(array $data)
    {
        $sql = 'SELECT COUNT(id) AS chamados_fechados FROM chamado WHERE situacao = "FECHADO" AND id_receptor_chamado = :id_receptor_chamado';
                
        $conn = Connection::connect();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_receptor_chamado', $data['id_receptor_chamado'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}
?>
