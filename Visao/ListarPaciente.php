<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listconsu.css">
    <title>Listagem de Pacientes</title>
    <script language="javaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Deseja realmente excluir este paciente?');
        }
    </script>
</head>
<body>

<?php
    require_once '../Modelo/ClassPaciente.php';
    require_once '../Modelo/DAO/ClassPacienteDAO.php';
    
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


    echo "</table>";
    echo "</div>";
?>

</body>
</html>
