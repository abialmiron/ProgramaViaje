<?php
class ResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmp, $numLic, $nom, $ape){
        $this->numEmpleado = $numEmp;
        $this->numLicencia = $numLic;
        $this->nombre = $nom;
        $this->apellido = $ape;
    }

    public function setNumEmpleado($numEmpleadoNuevo){
        $this->numEmpleado = $numEmpleadoNuevo;
    }
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function setNumLicencia($numLicenciaNuevo){
        $this->numLicencia = $numLicenciaNuevo;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function setNombre($nombreNuevo){
        $this->nombre = $nombreNuevo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setApellido($apellidoNuevo){
        $this->apellido = $apellidoNuevo;
    }
    public function getApellido(){
        return $this->apellido;
    }
}
?>