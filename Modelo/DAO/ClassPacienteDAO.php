<?php
require_once 'Conexao.php';
require_once '../Modelo/ClassPaciente.php';

class ClassPacienteDAO
{
    public function cadastrar(ClassPaciente $paciente)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO pacientes (nomePaciente, dataNascimento, endereco, telefone, email) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $paciente->getNomePaciente());
            $stmt->bindValue(2, $paciente->getDataNascimento());
            $stmt->bindValue(3, $paciente->getEndereco());
            $stmt->bindValue(4, $paciente->getTelefone());
            $stmt->bindValue(5, $paciente->getEmail());
            $stmt->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarPaciente($idPaciente)
    {
        try {
            $paciente = new ClassPaciente();
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM pacientes WHERE idPaciente = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idPaciente);
            $stmt->execute();
            $pacienteAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($pacienteAssoc) {
                $paciente->setIdPaciente($pacienteAssoc['idPaciente']);
                $paciente->setNomePaciente($pacienteAssoc['nomePaciente']);
                $paciente->setDataNascimento($pacienteAssoc['dataNascimento']);
                $paciente->setEndereco($pacienteAssoc['endereco']);
                $paciente->setTelefone($pacienteAssoc['telefone']);
                $paciente->setEmail($pacienteAssoc['email']);
            }

            return $paciente;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarPacientes()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM pacientes ORDER BY nomePaciente ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarPaciente(ClassPaciente $paciente)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE pacientes SET nomePaciente = ?, dataNascimento = ?, endereco = ?, telefone = ?, email = ? WHERE idPaciente = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $paciente->getNomePaciente());
            $stmt->bindValue(2, $paciente->getDataNascimento());
            $stmt->bindValue(3, $paciente->getEndereco());
            $stmt->bindValue(4, $paciente->getTelefone());
            $stmt->bindValue(5, $paciente->getEmail());
            $stmt->bindValue(6, $paciente->getIdPaciente());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirPaciente($idPaciente)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM pacientes WHERE idPaciente = :idPaciente";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idPaciente', $idPaciente);
            $stmt->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}

