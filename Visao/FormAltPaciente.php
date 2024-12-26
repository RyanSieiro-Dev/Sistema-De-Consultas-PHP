<?php
session_start();
$titulo_pagina = "Alteração de Paciente"; 
require_once '../Modelo/ClassPaciente.php';
require_once '../Modelo/DAO/ClassPacienteDAO.php';

$id = @$_GET['idPaciente'];
$novoPaciente = new ClassPaciente();
$pacienteDAO = new ClassPacienteDAO();
$novoPaciente = $pacienteDAO->buscarPaciente($id);
?>

<link rel="stylesheet" href="css/altpaci.css">

<h2>Alteração de Paciente</h2>

<form method="POST" action="../Controle/ControlePaciente.php?ACAO=alterarPaciente">
    <input type="hidden" name="idPaciente" value="<?php echo $novoPaciente->getIdPaciente(); ?>">
    
    <div class="form-group">
        <label for="nomePaciente">Nome:</label>
        <input type="text" name="nomePaciente" size="50" value="<?php echo $novoPaciente->getNomePaciente(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" name="dataNascimento" value="<?php echo $novoPaciente->getDataNascimento(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" size="50" value="<?php echo $novoPaciente->getEndereco(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" size="20" value="<?php echo $novoPaciente->getTelefone(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" size="40" value="<?php echo $novoPaciente->getEmail(); ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>
</form>

<a href="Home.php"><button class="btn btn-secondary mt-2">Voltar</button></a>
