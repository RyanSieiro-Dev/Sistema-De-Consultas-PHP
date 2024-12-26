<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listconsu.css">
    <title>Listagem de Médicos</title>
    <script language="javaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Deseja realmente excluir este médico?');
        }
    </script>
</head>
<body>

<?php
    require_once '../Modelo/ClassMedico.php';
    require_once '../Modelo/DAO/ClassMedicoDAO.php';

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
?>

</body>
</html>
