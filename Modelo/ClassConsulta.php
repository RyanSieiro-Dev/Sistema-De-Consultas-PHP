<?php
class ClassConsulta
{
    private $idConsulta;
    private $idMedico;
    private $idPaciente;
    private $dataConsulta;
    private $horaConsulta;
    private $status;

    function getIdConsulta()
    {
        return $this->idConsulta;
    }

    function getIdMedico()
    {
        return $this->idMedico;
    }

    function getIdPaciente()
    {
        return $this->idPaciente;
    }

    function getDataConsulta()
    {
        return $this->dataConsulta;
    }

    function getHoraConsulta()
    {
        return $this->horaConsulta;
    }

    function getStatus()
    {
        return $this->status;
    }

    function setIdConsulta($idConsulta)
    {
        $this->idConsulta = $idConsulta;
    }

    function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }

    function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    function setDataConsulta($dataConsulta)
    {
        $this->dataConsulta = $dataConsulta;
    }

    function setHoraConsulta($horaConsulta)
    {
        $this->horaConsulta = $horaConsulta;
    }

    function setStatus($status)
    {
        $this->status = $status;
    }
}
?>
