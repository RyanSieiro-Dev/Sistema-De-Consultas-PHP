<?php
session_start();
$titulo_pagina = "Home - Sistema de Consultas"; 


require_once '../Modelo/ClassMedico.php';
require_once '../Modelo/DAO/ClassMedicoDAO.php';
require_once '../Modelo/ClassPaciente.php';
require_once '../Modelo/DAO/ClassPacienteDAO.php';
require_once '../Modelo/ClassConsulta.php';
require_once '../Modelo/DAO/ClassConsultaDAO.php';




echo "<h2>Lista de Médicos</h2>";
$classMedicoDAO = new ClassMedicoDAO();
$medicos = $classMedicoDAO->listarMedicos();

echo "<table class='table'>";
echo "  <tr>";
echo "      <th>Nome</th>";
echo "      <th>Especialidade</th>";
echo "      <th>Email</th>";
echo "      <th>Telefone</th>";
echo "      <th>Excluir</th>";
echo "      <th>Alterar</th>";
echo "  </tr>";

foreach ($medicos as $medico) {
    echo "<tr>";
    echo "<td>" . $medico['nomeMedico'] . "</td>";
    echo "<td>" . $medico['especialidade'] . "</td>";
    echo "<td>" . $medico['email'] . "</td>";
    echo "<td>" . $medico['telefone'] . "</td>";
    echo "<td><a href='../Controle/ControleMedico.php?ACAO=excluirMedico&idMedico=" . $medico["idMedico"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este médico?\")'><button class='btn btn-danger'>Excluir</button></a></td>";
    echo "<td><a href='../Visao/FormAltMedico.php?idMedico=" . $medico["idMedico"] . "'><button class='btn btn-warning'>Alterar</button></a></td>";
    echo "</tr>";
}
echo "</table>";

// Exibindo os pacientes
echo "<h2>Lista de Pacientes</h2>";
$classPacienteDAO = new ClassPacienteDAO();
$pacientes = $classPacienteDAO->listarPacientes();

echo "<table class='table'>";
echo "  <tr>";
echo "      <th>Nome</th>";
echo "      <th>Data de Nascimento</th>";
echo "      <th>Endereço</th>";
echo "      <th>Telefone</th>";
echo "      <th>Email</th>";
echo "      <th>Excluir</th>";
echo "      <th>Alterar</th>";
echo "  </tr>";

foreach ($pacientes as $paciente) {
    echo "<tr>";
    echo "<td>" . $paciente['nomePaciente'] . "</td>";
    echo "<td>" . $paciente['dataNascimento'] . "</td>";
    echo "<td>" . $paciente['endereco'] . "</td>";
    echo "<td>" . $paciente['telefone'] . "</td>";
    echo "<td>" . $paciente['email'] . "</td>";
    echo "<td><a href='../Controle/ControlePaciente.php?ACAO=excluirPaciente&idPaciente=" . $paciente["idPaciente"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este paciente?\")'><button class='btn btn-danger'>Excluir</button></a></td>";
    echo "<td><a href='../Visao/FormAltPaciente.php?idPaciente=" . $paciente["idPaciente"] . "'><button class='btn btn-warning'>Alterar</button></a></td>";
    echo "</tr>";
}
echo "</table>";

// Exibindo as consultas
echo "<h2>Lista de Consultas</h2>";
$classConsultaDAO = new ClassConsultaDAO();
$consultas = $classConsultaDAO->listarConsultas();

echo "<table class='table'>";
echo "  <tr>";
echo "      <th>Médico</th>";
echo "      <th>Paciente</th>";
echo "      <th>Data</th>";
echo "      <th>Hora</th>";
echo "      <th>Status</th>";
echo "      <th>Excluir</th>";
echo "      <th>Alterar</th>";
echo "  </tr>";

foreach ($consultas as $consulta) {
    echo "<tr>";
    echo "<td>" . $consulta['dataConsulta'] . "</td>";
    echo "<td>" . $consulta['horaConsulta'] . "</td>";
    echo "<td>" . $consulta['nomeMedico'] . "</td>";
    echo "<td>" . $consulta['nomePaciente'] . "</td>";
    echo "<td>" . $consulta['status'] . "</td>";
    echo "<td><a href='../Controle/ControleConsulta.php?ACAO=excluirConsulta&idConsulta=" . $consulta["idConsulta"] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta consulta?\")'><button class='btn btn-danger'>Excluir</button></a></td>";
    echo "<td><a href='../Visao/FormAltConsulta.php?idConsulta=" . $consulta["idConsulta"] . "'><button class='btn btn-warning'>Alterar</button></a></td>";
    echo "</tr>";
}
echo "</table>";

echo "<hr>";
?>
<link rel="stylesheet" href="css/home.css">


<!-- Links para as páginas de cadastro -->
<div>
    <a href="../index.php"><button class="btn btn-success">Menu</button></a>
    <a href="FormCadMedico.php"><button class="btn btn-success">Cadastrar Médico</button></a>
    <a href="FormCadPaciente.php"><button class="btn btn-success">Cadastrar Paciente</button></a>
    <a href="FormCadConsulta.php"><button class="btn btn-success">Cadastrar Consulta</button></a>
</div>
