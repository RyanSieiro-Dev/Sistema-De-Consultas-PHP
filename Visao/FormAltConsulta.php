<?php
session_start();
$titulo_pagina = "Alteração de Consulta";
require_once '../Modelo/ClassConsulta.php';
require_once '../Modelo/DAO/ClassConsultaDAO.php';
require_once '../Modelo/DAO/ClassMedicoDAO.php';
require_once '../Modelo/DAO/ClassPacienteDAO.php';

// Listando médicos e pacientes para o formulário
$classMedicoDAO = new ClassMedicoDAO();
$medicos = $classMedicoDAO->listarMedicos();
$classPacienteDAO = new ClassPacienteDAO();
$pacientes = $classPacienteDAO->listarPacientes();

$id = @$_GET['idConsulta']; 
$novaConsulta = new ClassConsulta();
$consultaDAO = new ClassConsultaDAO();
$novaConsulta = $consultaDAO->buscarConsulta($id);
?>

<link rel="stylesheet" href="css/altconsu.css">


<h2>Alteração de Consulta</h2>

<form method="POST" action="../Controle/ControleConsulta.php?ACAO=alterarConsulta">
    <input type="hidden" name="idConsulta" value="<?php echo $novaConsulta->getIdConsulta(); ?>"> 
    
    <div class="form-group">
        <label for="data_consulta">Data da Consulta:</label>
        <input type="date" name="data_consulta" value="<?php echo $novaConsulta->getDataConsulta(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="hora_consulta">Hora da Consulta:</label>
        <input type="time" name="hora_consulta" value="<?php echo $novaConsulta->getHoraConsulta(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="id_medico">Médico:</label>
        <select class="form-control" name="id_medico" required>
            <option value="">Selecione o Médico</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['idMedico'] ?>" <?= ($novaConsulta->getIdMedico() == $medico['idMedico']) ? 'selected' : '' ?>><?= $medico['nomeMedico'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="id_paciente">Paciente:</label>
        <select class="form-control" name="id_paciente" required>
            <option value="">Selecione o Paciente</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['idPaciente'] ?>" <?= ($novaConsulta->getIdPaciente() == $paciente['idPaciente']) ? 'selected' : '' ?>><?= $paciente['nomePaciente'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Status da Consulta:</label>
        <select class="form-control" name="status" required>
            <option value="Agendada" <?= ($novaConsulta->getStatus() == 'Agendada') ? 'selected' : '' ?>>Agendada</option>
            <option value="Realizada" <?= ($novaConsulta->getStatus() == 'Realizada') ? 'selected' : '' ?>>Realizada</option>
            <option value="Cancelada" <?= ($novaConsulta->getStatus() == 'Cancelada') ? 'selected' : '' ?>>Cancelada</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>
</form>

<a href="Home.php"><button class="btn btn-secondary mt-2">Voltar</button></a>
