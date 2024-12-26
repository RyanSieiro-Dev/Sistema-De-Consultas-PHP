<?php
class ClassPaciente
{
    private $idPaciente;
    private $nomePaciente;
    private $dataNascimento;
    private $endereco;
    private $telefone;
    private $email;

    function getIdPaciente()
    {
        return $this->idPaciente;
    }

    function getNomePaciente()
    {
        return $this->nomePaciente;
    }

    function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    function getEndereco()
    {
        return $this->endereco;
    }

    function getTelefone()
    {
        return $this->telefone;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    function setNomePaciente($nomePaciente)
    {
        $this->nomePaciente = $nomePaciente;
    }

    function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
}
?>
