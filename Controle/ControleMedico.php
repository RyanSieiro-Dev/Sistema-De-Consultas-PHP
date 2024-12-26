<?php
require_once '../Modelo/ClassMedico.php';
require_once '../Modelo/DAO/ClassMedicoDAO.php';

$id = @$_POST['idMedico'];
$nome = @$_POST['nomeMedico'];
$especialidade = @$_POST['especialidade'];
$email = @$_POST['email'];
$telefone = @$_POST['telefone'];
$acao = $_GET['ACAO'] ?? null;

$novoMedico = new ClassMedico();
$novoMedico->setIdMedico($id);
$novoMedico->setNomeMedico($nome);
$novoMedico->setEspecialidade($especialidade);
$novoMedico->setEmail($email);
$novoMedico->setTelefone($telefone);

$classMedicoDAO = new ClassMedicoDAO();

switch ($acao) {
    case "cadastrarMedico":
        $medico = $classMedicoDAO->cadastrar($novoMedico);
        if ($medico) {
            header('Location:../index.php?&MSG=Cadastro de médico realizado com sucesso!');
        } else {
            header('Location:../index.php?&MSG=Não foi possível realizar o cadastro!');
        }
        break;

    case 'alterarMedico':
        $medico = $classMedicoDAO->alterarMedico($novoMedico);
        if ($medico) {
            header('Location:../index.php?&MSG=Cadastro de médico atualizado com sucesso!');
        } else {
            header('Location:../index.php?&MSG=Não foi possível realizar a atualização!');
        }
        break;

    case "excluirMedico":
        if (isset($_GET['idMedico'])) {
            $idMedico = $_GET['idMedico'];
            $medico = $classMedicoDAO->excluirMedico($idMedico);
            if ($medico) {
                header('Location:../index.php?PAGINA=listarMedicos&MSG=Médico excluído com sucesso!');
            } else {
                header('Location:../index.php?PAGINA=listarMedicos&MSG=Não foi possível excluir o médico!');
            }
        }
        break;

    default:
        break;
}
?>
