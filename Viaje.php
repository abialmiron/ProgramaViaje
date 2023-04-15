<?php
class Viaje{
    //Guarda los datos de un viaje 
    //los atributos son: int $cod_viaje, string $destino, int $cantMaximaPasajeros, array $pasajeros
    private $cod_viaje;
    private $destino;
    private $cantMaximaPasajeros;
    private $pasajeros;

    /************* Metodo constructor *************/
    public function __construct($codviaje, $des, $cantmaxpasajeros, $pas){
        $this->cod_viaje = $codviaje;
        $this->destino = $des;
        $this->cantMaximaPasajeros = $cantmaxpasajeros;
        $this->pasajeros = $pas;
    }

    /*************** SETTERS Y GETTERS ********************/
    /** Coloca el valor pasado por parámetro en el atributo cod_viaje
    *@param int $codviaje */
    public function setCodViaje($codviaje){
        $this->cod_viaje = $codviaje;
    }
    /** Devuelve el valor actual almacenado en el atributo cod_viaje
    * @return int */
    public function getCodViaje(){
        return $this->cod_viaje;
    }
    /** Coloca el valor pasado por parámetro en el atributo destino
    * @param string $des */
    public function setDestino($des){
        $this->destino = $des;
    }
    /*Devuelve el valor actual almacenado en el atributo destino
    @return string $destino*/
    public function getDestino(){
        return $this->destino;
    }
    /** Coloca el valor pasado por parámetro en el atributo cantMaximaPasajeros
    * @param int $cantMaxPasajeros 
    */
    public function setCantMaximaPasajeros($cantMaxPasajeros){
        $this->cantMaximaPasajeros = $cantMaxPasajeros;
    }
    /** Devuelve el valor actual almacenado en el atributo cantMaximaPasajeros
    * @return int $cantMaximaPasajeros
    */
    public function getCantMaximaPasajeros(){
        return $this->cantMaximaPasajeros;
    }
    /** Coloca el valor pasado por parámetro en el atributo pasajeros 
    *@param array $pasajeros 
    */
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }
    /** Devuelve el valor actual almacenado en el atributo pasajeros
    * @return array $pasajeros
    */
    public function getPasajeros(){
        return $this->pasajeros;
    }

    /************ METODOS PROPIOS DE LA CLASE ************/

    /** Este método se encarga de mostrar la colección de pasajeros de una forma mas entendible.
     *  @return string $mensaje
     */
    public function mostrarPasajeros(){
        $colPasajeros = $this->getPasajeros();
        for ($i=0;$i < count($colPasajeros); $i++){
            $mensaje .= "Pasajero: " . ($i+1) . "\n";
            $mensaje .= "DNI: ". $colPasajeros[$i]['dni']."\n";
            $mensaje .= "Nombre: ". $colPasajeros[$i]['nombre']."\n";
            $mensaje .= "Apellido: ". $colPasajeros[$i]['apellido']."\n";
        }
        return $mensaje;
    }
    /** Este método se encarga de buscar un pasajero en el arreglo de pasajeros, busca por DNI.
     * @param int $dniABuscar
     * @return int $i -> es la posición donde se encuentra ese pasajero con ese DNI. Si no lo encuentra devuelve -1.
     */
    public function buscaPasajero($dniABuscar){
        $colPasajeros = $this->getPasajeros();
        $i = 0;
        $encontro = false;
        $longitud = count($colPasajeros);
        while($i < $longitud && !$encontro){
            $encontro = $colPasajeros[$i]['dni'] == $dniABuscar;
            $i++;
        }
        if($encontro){
            $i--;
        } else {
            $i = -1;
        }
        return $i;
    }
    /** Este método se encarga de modificar el DNI de un pasajero, buscandolo por su DNI.
     * @param int $dniABuscar
     * @param int $dniCambio
     */
    public function modificarDniPasajero($dniABuscar, $dniCambio){
        $indice = $this->buscaPasajero($dniABuscar);
        $colPasajeros = $this->getPasajeros();
        $colPasajeros[$indice]['dni'] = $dniCambio;
        $this->setPasajeros($colPasajeros);
    }
    /** Este método se encarga de modificar el nombre de un pasajero, buscandolo por su DNI.
     * @param int $dniDelPasajero
     * @param string $nuevoNombre
     */
    public function modificarNombrePasajero($dniDelPasajero, $nuevoNombre){
        $indice = $this->buscaPasajero($dniDelPasajero);
        $colPasajeros = $this->getPasajeros();
        $colPasajeros[$indice]['nombre'] = $nuevoNombre;
        $this->setPasajeros($colPasajeros);
    }
    /** Este método se encarga de modificar el apellido de un pasajero, buscandolo por su DNI.
     * @param int $dniDelPasajero
     * @param string $nuevoApellido
     */
    public function modificarApellidoPasajero($dniDelPasajero, $nuevoApellido){
        $indice = $this->buscaPasajero($dniDelPasajero);
        $colPasajeros = $this->getPasajeros();
        $colPasajeros[$indice]['apellido'] = $nuevoApellido;
        $this->setPasajeros($colPasajeros);
    }
    /** Este método se encarga de agregar un nuevo pasajero en la colección de pasajeros
     * @param int $dniNuevo
     * @param string $nombreNuevo
     * @param string $apellidoNuevo
     */
    public function agregarPasajero($dniNuevo, $nombreNuevo,$apellidoNuevo){
        $colPasajeros = $this->getPasajeros();
        if($this->getCantMaximaPasajeros() >= count($colPasajeros)){
            $colPasajeros[] = ["dni" => $dniNuevo,"nombre" => $nombreNuevo, "apellido" => $apellidoNuevo];
            $this->setPasajeros($colPasajeros);
        }
    }

    public function __toString(){
        return "Código de viaje: " . $this->getCodViaje() . "\n".  
        "Destino: " . $this->getDestino() . "\n" .
        "Cantidad máxima de pasajeros: " . $this->getCantMaximaPasajeros() . "\n".
        $this->mostrarPasajeros();
    }   
}
?>