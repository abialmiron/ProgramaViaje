<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $dni;
    /******* CONSTRUCTOR *******/
    public function __construct($dniConstructor, $nombreConstructor, $apellidoConstructor){
        $this->dni = $dniConstructor;
        $this->nombre = $nombreConstructor;
        $this->apellido = $apellidoConstructor;
    }
    /******* SETTERS Y GETTERS *******/

    /** Se encarga de setearle un nuevo valor al atributo DNI
     * @param int $dniNuevo
     */
    public function setDni($dniNuevo){
        $this->dni = $dniNuevo;
    }
    /** Se encarga de devolver el valor actual del atributo DNI
     * @return int $dni
     */
    public function getDni(){
        return $this->dni;
    }
    /** Se encarga de setearle un nuevo valor al atributo Nombre
     * @param string $nombreNuevo
     */
    public function setNombre($nombreNuevo){
        $this->nombre = $nombreNuevo;
    }
    /** Se encarga de devolver el valor actual del atributo Nombre
     * @return string $nombre
     */
    public function getNombre(){
        return $this->nombre;
    }
    /** Se encarga de setearle un nuevo valor al atributo Apellido
     * @param string $apellidoNuevo
     */
    public function setApellido($apellidoNuevo){
        $this->apellido = $apellidoNuevo;
    }
    /** Se encarga de devolver el valor actual del atributo Apellido
     * @return string $apellido
     */
    public function getApellido(){
        return $this->apellido;
    }

    public function __toString(){
        return 'DNI: ' . $this->getDni() . "\n" . 
        'Nombre: ' . $this->getNombre() . "\n" . 
        'Apellido: ' . $this->getApellido();
    }

}
?>