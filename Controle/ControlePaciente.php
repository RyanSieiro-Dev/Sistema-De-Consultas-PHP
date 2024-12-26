<?php
require_once '../Modelo/ClassPaciente.php';
require_once '../Modelo/DAO/ClassPacienteDAO.php';

$id = @$_POST['idPaciente'];
$nome = @$_POST['nomePaciente'];
$dataNascimento = @$_POST['dataNascimento'];
$endereco = @$_POST['endereco'];
$telefone = @$_POST['telefone'];
$email = @$_POST['email'];
$acao = $_GET['ACAO'] ?? null;

$novoPaciente = new ClassPaciente();
$novoPaciente->setIdPaciente($id);
$novoPaciente->setNomePaciente($nome);
$novoPaciente->setDataNascimento($dataNascimento);
$novoPaciente->setEndereco($endereco);
$novoPaciente->setTelefone($telefone);
$novoPaciente->setEmail($email);

$classPacienteDAO = new ClassPacienteDAO();

switch ($acao) {
    case "cadastrarPaciente":
        $paciente = $classPacienteDAO->cadastrar($novoPaciente);
        if ($paciente) {
            header('Location:../index.php?&MSG=Cadastro de paciente realizado com sucesso!');
        } else {
            header('Location:../index.php?&MSG=Não foi possível realizar o cadastro!');
        }
        break;

    case 'alterarPaciente':
        $paciente = $classPacienteDAO->alterarPaciente($novoPaciente);
        if ($paciente) {
            header('Location:../index.php?&MSG=Cadastro de paciente atualizado com sucesso!');
        } else {
            header('Location:../index.php?&MSG=Não foi possível realizar a atualização!');
        }
        break;

    case "excluirPaciente":
        if (isset($_GET['idPaciente'])) {
            $idPaciente = $_GET['idPaciente'];
            $paciente = $classPacienteDAO->excluirPaciente($idPaciente);
            if ($paciente) {
                header('Location:../index.php?PAGINA=listarPacientes&MSG=Paciente excluído com sucesso!');
            } else {
                header('Location:../index.php?PAGINA=listarPacientes&MSG=Não foi possível excluir o paciente!');
            }
        }
        break;

    default:
        break;
}
?>
