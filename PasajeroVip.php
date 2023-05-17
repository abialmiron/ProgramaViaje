<?php
//include "Pasajero.php";
class PasajeroVip extends Pasajero{
    private $numViajeroFrecuente;
    private $cantMillas;

    public function __construct($dniConstructor, $nombreConstructor, $apellidoConstructor, $nroAsientoConstructor, $nroTicketConstructor,$numViajeroFrecuente, $cantMillas){
        parent::__construct($dniConstructor, $nombreConstructor, $apellidoConstructor, $nroAsientoConstructor, $nroTicketConstructor);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }

    /** Se encarga de setearle un nuevo valor al atributo numViajeroFrecuente
     * @param int $numViajeroFrecuente
     */
    public function setNumViajeroFrecuente($numViajeroFrecuente){
        $this->numViajeroFrecuente = $numViajeroFrecuente;
    }
    /** Se encarga de devolver el valor actual del atributo numViajeroFrecuente
     * @return $numViajeroFrecuente
     */
    public function getNumViajeroFrecuente(){
        return $this->numViajeroFrecuente;
    }
    /** Se encarga de setearle un nuevo valor al atributo cantMillas
     * @param int $cantMillas
     */
    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }
    /** Se encarga de devolver el valor actual del atributo cantMillas
     * @return $cantMillas
     */
    public function getCantMillas(){
        return $this->cantMillas;
    }

    public function darPorcentajeIncremento(){
        $cantMillas = $this->getCantMillas();
        $numViajFrec = $this->getNumViajeroFrecuente();
        if ($cantMillas > 300){
            $incremento = 30;
        } else { 
            $incremento = 35;
        }
        return $incremento;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "\n" . 'Número de viajero frecuente: ' . $this->getNumViajeroFrecuente() . "\n" . 'Cantidad de millas: ' . $this->getCantMillas();
        return $cadena;
    }
}
?>