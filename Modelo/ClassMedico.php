<?php
class ClassMedico
{
    private $idMedico;
    private $nomeMedico;
    private $especialidade;
    private $email;
    private $telefone;

    function getIdMedico()
    {
        return $this->idMedico;
    }

    function getNomeMedico()
    {
        return $this->nomeMedico;
    }

    function getEspecialidade()
    {
        return $this->especialidade;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getTelefone()
    {
        return $this->telefone;
    }

    function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }

    function setNomeMedico($nomeMedico)
    {
        $this->nomeMedico = $nomeMedico; 
    }

    function setEspecialidade($especialidade)
    {
        $this->especialidade = $especialidade;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}
?>
