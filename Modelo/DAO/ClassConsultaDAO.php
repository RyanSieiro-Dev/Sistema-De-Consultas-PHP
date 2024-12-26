<?php
require_once 'Conexao.php';
require_once '../Modelo/ClassConsulta.php';

class ClassConsultaDAO
{
    public function cadastrar(ClassConsulta $consulta)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO consultas (idMedico, idPaciente, dataConsulta, horaConsulta, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $consulta->getIdMedico());
            $stmt->bindValue(2, $consulta->getIdPaciente());
            $stmt->bindValue(3, $consulta->getDataConsulta());
            $stmt->bindValue(4, $consulta->getHoraConsulta());
            $stmt->bindValue(5, $consulta->getStatus());
            $stmt->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarConsulta($idConsulta)
    {
        try {
            $consulta = new ClassConsulta();
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM consultas WHERE idConsulta = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idConsulta);
            $stmt->execute();
            $consultaAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($consultaAssoc) {
                $consulta->setIdConsulta($consultaAssoc['idConsulta']);
                $consulta->setIdMedico($consultaAssoc['idMedico']);
                $consulta->setIdPaciente($consultaAssoc['idPaciente']);
                $consulta->setDataConsulta($consultaAssoc['dataConsulta']);
                $consulta->setHoraConsulta($consultaAssoc['horaConsulta']);
                $consulta->setStatus($consultaAssoc['status']);
            }

            return $consulta;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarConsultas()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT consultas.idConsulta, consultas.dataConsulta, consultas.horaConsulta, consultas.status, 
                           medicos.nomeMedico, pacientes.nomePaciente 
                    FROM consultas
                    JOIN medicos ON consultas.idMedico = medicos.idMedico
                    JOIN pacientes ON consultas.idPaciente = pacientes.idPaciente
                    ORDER BY consultas.dataConsulta, consultas.horaConsulta ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarConsulta(ClassConsulta $consulta)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE consultas SET idMedico = ?, idPaciente = ?, dataConsulta = ?, horaConsulta = ?, status = ? WHERE idConsulta = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $consulta->getIdMedico());
            $stmt->bindValue(2, $consulta->getIdPaciente());
            $stmt->bindValue(3, $consulta->getDataConsulta());
            $stmt->bindValue(4, $consulta->getHoraConsulta());
            $stmt->bindValue(5, $consulta->getStatus());
            $stmt->bindValue(6, $consulta->getIdConsulta());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirConsulta($idConsulta)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM consultas WHERE idConsulta = :idConsulta";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idConsulta', $idConsulta);
            $stmt->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
?>
