<?php
require_once '../Modelo/ClassConsulta.php';
require_once '../Modelo/DAO/ClassConsultaDAO.php';

$id = @$_POST['idConsulta'];
$idMedico = @$_POST['id_medico'];
$idPaciente = @$_POST['id_paciente'];
$dataConsulta = @$_POST['data_consulta'];
$horaConsulta = @$_POST['hora_consulta'];
$status = @$_POST['status'];
$acao = $_GET['ACAO'] ?? null;

$novaConsulta = new ClassConsulta();
$novaConsulta->setIdConsulta($id);
$novaConsulta->setIdMedico($idMedico);
$novaConsulta->setIdPaciente($idPaciente);
$novaConsulta->setDataConsulta($dataConsulta);  
$novaConsulta->setHoraConsulta($horaConsulta);
$novaConsulta->setStatus($status);

$classConsultaDAO = new ClassConsultaDAO();

switch ($acao) {
    case "cadastrarConsulta":
        $consulta = $classConsultaDAO->cadastrar($novaConsulta);
        if ($consulta) {
            header('Location:../index.php?&MSG=Consulta cadastrada com sucesso!');
        } else {
            header('Location:../index.php?&MSG=Não foi possível cadastrar a consulta!');
        }
        break;

    case 'alterarConsulta':
        $consulta = $classConsultaDAO->alterarConsulta($novaConsulta);
        if ($consulta) {
            header('Location:../index.php?&MSG=Consulta atualizada com sucesso!');
        } else {
            header('Location:../index.php?&MSG=Não foi possível atualizar a consulta!');
        }
        break;

    case "excluirConsulta":
        if (isset($_GET['idConsulta'])) {
            $idConsulta = $_GET['idConsulta'];
            $consulta = $classConsultaDAO->excluirConsulta($idConsulta);
            if ($consulta) {
                header('Location:../index.php?PAGINA=listarConsultas&MSG=Consulta excluída com sucesso!');
            } else {
                header('Location:../index.php?PAGINA=listarConsultas&MSG=Não foi possível excluir a consulta!');
            }
        }
        break;

    default:
        break;
}
?>
