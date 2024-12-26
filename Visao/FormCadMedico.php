<?php
session_start();
$titulo_pagina = "Cadastro de Médico"; 
require_once '../Modelo/ClassMedico.php';
require_once '../Modelo/DAO/ClassMedicoDAO.php';
?>

<link rel="stylesheet" href="css/cadmedi.css">

<h2>Cadastro de Médico</h2>

<form action="../Controle/ControleMedico.php?ACAO=cadastrarMedico" method="POST">
    <div class="form-group">
        <label for="nomeMedico">Nome:</label>
        <input type="text" class="form-control" id="nomeMedico" name="nomeMedico" required>
    </div>

    <div class="form-group">
        <label for="especialidade">Especialidade:</label>
        <input type="text" class="form-control" id="especialidade" name="especialidade" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<a href="Home.php"><button class="btn btn-secondary mt-2">Voltar</button></a>
