<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $dni;
    private $nroAsiento;
    private $nroTicket;

    /******* CONSTRUCTOR *******/
    public function __construct($dniConstructor, $nombreConstructor, $apellidoConstructor,$nroAsientoConstructor, $nroTicketConstructor){
        $this->dni = $dniConstructor;
        $this->nombre = $nombreConstructor;
        $this->apellido = $apellidoConstructor;
        $this->nroAsiento = $nroAsientoConstructor;
        $this->nroTicket = $nroTicketConstructor;
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
    /** Se encarga de setearle un nuevo valor al atributo nroAsiento
     * @param int $nroAsiento
     */
    public function setNroAsiento($nroAsientoNuevo){
        $this->nroAsiento = $nroAsientoNuevo;
    }
    /** Se encarga de devolver el valor actual del atributo nroAsiento
     * @return $nroAsiento
     */
    public function getNroAsiento(){
        return $this->nroAsiento;
    }
    /** Se encarga de setearle un nuevo valor al atributo nroTicket
     * @param int $nroTicket
     */
    public function setNroTicket($nroTicketNuevo){
        $this->nroTicket = $nroTicketNuevo;
    }
    /** Se encarga de devolver el valor actual del atributo nroTicket
     * @return $nroTicket
     */
    public function getNroTicket(){
        return $this->nroTicket;
    }
    
    public function darPorcentajeIncremento(){
        $incremento = 10;
        return $incremento;
    }
    public function __toString(){
        return 'DNI: ' . $this->getDni() . "\n" . 
        'Nombre: ' . $this->getNombre() . "\n" . 
        'Apellido: ' . $this->getApellido(). "\n" .
        'Número de asiento: ' . $this->getNroAsiento() . "\n" .
        'Número de ticket: ' . $this->getNroTicket();
    }

}
?>