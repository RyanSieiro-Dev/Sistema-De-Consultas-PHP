<?php
$titulo_pagina = "Cadastro de Paciente"; 
require_once '../Modelo/ClassPaciente.php';
require_once '../Modelo/DAO/ClassPacienteDAO.php';
?>

<link rel="stylesheet" href="css/altconsu.css">

<h2>Cadastro de Paciente</h2>

<form action="../Controle/ControlePaciente.php?ACAO=cadastrarPaciente" method="POST">
    <div class="form-group">
        <label for="nomePaciente">Nome:</label>
        <input type="text" class="form-control" id="nomePaciente" name="nomePaciente" required>
    </div>

    <div class="form-group">
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
    </div>

    <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" id="endereco" name="endereco" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<a href="Home.php"><button class="btn btn-secondary mt-2">Voltar</button></a>
