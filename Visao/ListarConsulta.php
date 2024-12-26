<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listconsu.css">
    <title>Listagem de Consultas</title>
    <script language="javaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Deseja realmente excluir esta consulta?');
        }
    </script>
</head>
<body>

<?php
    require_once '../Modelo/ClassConsulta.php';
    require_once '../Modelo/DAO/ClassConsultaDAO.php';

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
        echo "<td>" . $consulta['nomeMedico'] . "</td>";
        echo "<td>" . $consulta['nomePaciente'] . "</td>";
        echo "<td>" . $consulta['dataConsulta'] . "</td>";
        echo "<td>" . $consulta['horaConsulta'] . "</td>";
        echo "<td>" . $consulta['status'] . "</td>";
        echo "<td><a href='../Controle/ControleConsulta.php?ACAO=excluirConsulta&idConsulta=" . $consulta["idConsulta"] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta consulta?\")'><button class='btn btn-danger'>Excluir</button></a></td>";
        echo "<td><a href='../Visao/FormAltConsulta.php?idConsulta=" . $consulta["idConsulta"] . "'><button class='btn btn-warning'>Alterar</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<hr>";
?>

</body>
</html>
