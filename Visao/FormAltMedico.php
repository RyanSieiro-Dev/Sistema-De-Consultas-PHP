<?php
session_start();
$titulo_pagina = "Alteração de Médico"; 
require_once '../Modelo/ClassMedico.php';
require_once '../Modelo/DAO/ClassMedicoDAO.php';

$id = @$_GET['idMedico'];
$novoMedico = new ClassMedico();
$medicoDAO = new ClassMedicoDAO();
$novoMedico = $medicoDAO->buscarMedico($id);
?>

<link rel="stylesheet" href="css/altmedi.css">

<h2>Alteração de Médico</h2>

<form method="POST" action="../Controle/ControleMedico.php?ACAO=alterarMedico">
    <input type="hidden" name="idMedico" value="<?php echo $novoMedico->getIdMedico(); ?>">
    
    <div class="form-group">
        <label for="nomeMedico">Nome:</label>
        <input type="text" name="nomeMedico" size="50" value="<?php echo $novoMedico->getNomeMedico(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" size="50" value="<?php echo $novoMedico->getEspecialidade(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" size="40" value="<?php echo $novoMedico->getEmail(); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" size="20" value="<?php echo $novoMedico->getTelefone(); ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>
</form>

<a href="Home.php"><button class="btn btn-secondary mt-2">Voltar</button></a>
