<?php
require_once 'Conexao.php';
require_once '../Modelo/ClassMedico.php';

class ClassMedicoDAO
{
    public function cadastrar(ClassMedico $medico)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO medicos (nomeMedico, especialidade, email, telefone) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $medico->getNomeMedico());
            $stmt->bindValue(2, $medico->getEspecialidade());
            $stmt->bindValue(3, $medico->getEmail());
            $stmt->bindValue(4, $medico->getTelefone());
            $stmt->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarMedico($idMedico)
    {
        try {
            $medico = new ClassMedico();
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM medicos WHERE idMedico = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idMedico);
            $stmt->execute();
            $medicoAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($medicoAssoc) {
                $medico->setIdMedico($medicoAssoc['idMedico']);
                $medico->setNomeMedico($medicoAssoc['nomeMedico']);
                $medico->setEspecialidade($medicoAssoc['especialidade']);
                $medico->setEmail($medicoAssoc['email']);
                $medico->setTelefone($medicoAssoc['telefone']);
            }

            return $medico;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarMedicos()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM medicos ORDER BY nomeMedico ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarMedico(ClassMedico $medico)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE medicos SET nomeMedico = ?, especialidade = ?, email = ?, telefone = ? WHERE idMedico = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $medico->getNomeMedico());
            $stmt->bindValue(2, $medico->getEspecialidade());
            $stmt->bindValue(3, $medico->getEmail());
            $stmt->bindValue(4, $medico->getTelefone());
            $stmt->bindValue(5, $medico->getIdMedico());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirMedico($idMedico)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM medicos WHERE idMedico = :idMedico";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idMedico', $idMedico);
            $stmt->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
?>
