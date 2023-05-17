<?php
//include "Pasajero.php";
class PasajeroNecesidadesEspeciales extends Pasajero{
    private $requiereSilla;
    private $requiereAsistencia;
    private $requiereComidas;

    public function __construct($dniConstructor, $nombreConstructor, $apellidoConstructor, $nroAsientoConstructor, $nroTicketConstructor, $requiereAsistencia, $requiereComidas, $requiereSilla){
        parent::__construct($dniConstructor, $nombreConstructor, $apellidoConstructor, $nroAsientoConstructor, $nroTicketConstructor);
        $this->requiereSilla = $requiereSilla;
        $this->requiereAsistencia = $requiereAsistencia;
        $this->requiereComidas = $requiereComidas;
    }

    /** Se encarga de setearle un nuevo valor al atributo requiereSilla
     * @param boolean $requiereSilla
     */
    public function setRequiereSilla($requiereSilla){
        $this->requiereSilla = $requiereSilla;
    }
    /** Se encarga de devolver el valor actual del atributo requiereSilla
     * @return $requiereSilla
     */
    public function getRequiereSilla(){
        return $this->requiereSilla;
    }

    /** Se encarga de setearle un nuevo valor al atributo requiereAsistencia
     * @param boolean $requiereAsistencia
     */
    public function setRequiereAsistencia($requiereAsistencia){
        $this->requiereAsistencia = $requiereAsistencia;
    }
    /** Se encarga de devolver el valor actual del atributo requiereAsistencia
     * @return $requiereAsistencia
     */
    public function getRequiereAsistencia(){
        return $this->requiereAsistencia;
    }

    /** Se encarga de setearle un nuevo valor al atributo requiereComidas
     * @param boolean $requiereComidas
     */
    public function setRequiereComidas($requiereComidas){
        $this->requiereComidas = $requiereComidas;
    }
    /** Se encarga de devolver el valor actual del atributo requiereAsistencia
     * @return $requiereAsistencia
     */
    public function getRequiereComidas(){
        return $this->requiereComidas;
    }

    public function darPorcentajeIncremento(){
        $reqSilla = $this->getRequiereSilla();
        $reqAsistencia = $this->getRequiereAsistencia();
        $reqComidas = $this->getRequiereComidas();

        if($reqSilla){
            if($reqAsistencia){
                if($reqComidas){
                    $incremento = 30;
                }
                $incremento = 15;
            }
            $incremento = 15;
        }
        return $incremento;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "\n" . 'Requiere silla de ruedas: ' . $this->getRequiereSilla() . "\n" . 'Requiere Asistencia: ' . $this->getRequiereAsistencia() . "\n" . 'Requiere comidas: ' . $this->getRequiereComidas();
        return $cadena;
    }
}
?>