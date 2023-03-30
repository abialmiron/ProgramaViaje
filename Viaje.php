<?php
class Viaje{
    //Guarda los datos de un viaje 
    //los atributos son: int $cod_viaje, string $destino, int $cantMaximaPasajeros, array $pasajeros
    private $cod_viaje;
    private $destino;
    private $cantMaximaPasajeros;
    private $pasajeros;

    /*Metodo constructor */
    public function __construct($codviaje, $des, $cantmaxpasajeros, $pas){
        $this->cod_viaje = $codviaje;
        $this->destino = $des;
        $this->cantMaximaPasajeros = $cantmaxpasajeros;
        $this->pasajeros = $pas;
    }

    /*************** SETTERS Y GETTERS ********************/
    /*Coloca el valor pasado por parámetro en el atributo cod_viaje
    @param int $codviaje */
    public function setCodViaje($codviaje){
        $this->cod_viaje = $codviaje;
    }
    /*Devuelve el valor actual almacenado en el atributo cod_viaje
    @return int */
    public function getCodViaje(){
        return $this->cod_viaje;
    }
    /*Coloca el valor pasado por parámetro en el atributo destino
    @param string $des */
    public function setDestino($des){
        $this->destino = $des;
    }
    /*Devuelve el valor actual almacenado en el atributo destino
    @return string $destino*/
    public function getDestino(){
        return $this->destino;
    }
    /*Coloca el valor pasado por parámetro en el atributo cantMaximaPasajeros
    @param int $cantMaxPasajeros */
    public function setCantMaximaPasajeros($cantMaxPasajeros){
        $this->cantMaximaPasajeros = $cantMaxPasajeros;
    }
    /*Devuelve el valor actual almacenado en el atributo cantMaximaPasajeros
    @return int $cantMaximaPasajeros*/
    public function getCantMaximaPasajeros(){
        return $this->cantMaximaPasajeros;
    }
    /*Coloca el valor pasado por parámetro en el atributo pasajeros 
    @param array $pasajeros */
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }
    /*Devuelve el valor actual almacenado en el atributo pasajeros
    @return array $pasajeros*/
    public function getPasajeros(){
        return $this->pasajeros;
    }

    public function __toString(){
        $mensaje = '';
        $mensaje .= "Código de viaje: " . $this->getCodViaje() . "\n".  
        "Destino: " . $this->getDestino() . "\n" .
        "Cantidad máxima de pasajeros: " . $this->getCantMaximaPasajeros() . "\n";
        $pasajeros = $this->getPasajeros();
        for ($i=0;$i < count($pasajeros); $i++){
            $mensaje .= "Pasajero: " . ($i+1) . "\n";
            $mensaje .= "DNI: ". $pasajeros[$i]['dni']."\n";
            $mensaje .= "Nombre: ". $pasajeros[$i]['nombre']."\n";
            $mensaje .= "Apellido: ". $pasajeros[$i]['apellido']."\n";
        }
        return $mensaje;
    }   
}
?>