<?php
include "Viaje.php";
include "Pasajero.php";
include "ResponsableV.php";

/* Esta función se encarga de desplegar el menu en pantalla
    @return int $respuesta */
function llamaMenu(){
    do {
        echo "*** Bienvenido a la carga de viajes de la empresa Viaje feliz ***"."\n";
        echo  "Indique la acción que quiere realizar:"."\n";
        echo "1) Cargar un nuevo viaje"."\n";
        echo "2) Modificar datos del viaje (no incluye pasajeros)"."\n";
        echo "3) Ver datos del viaje"."\n";
        echo "4) Cargar un nuevo pasajero al viaje"."\n";
        echo "5) Modificar un pasajero"."\n";
        echo "6) Eliminar un pasajero"."\n";
        echo "7) Ver datos de un pasajero"."\n";
        echo "8) Modificar datos del responsable"."\n";
        echo "Si desea terminar con el programa, ingrese 0" . "\n";
        $respuesta = trim(fgets(STDIN));
    
        }while(($respuesta<0  || $respuesta>9) || !is_numeric($respuesta));
        return $respuesta;
}
//Verifica que el dni ingresado sea de 7 u 8 dígitos.
    // @param int $dni
    // @return boolean $valido
function verificaFormatoDNI($dni){
    
    if ($dni < 99999 || $dni > 99999999){
        $valido = false;
    } else { 
        $valido = true;
    }
    return !$valido;
}

/*Esta función se encarga de que el DNI a cargar no se encuentre ya en el arreglo
    @param array $pasajeros son los pasajeros ya cargados
    @return int $dniPasajero */
function verificaDNI($pasajeros){
    do{
        $ciclo = false;
        echo 'Ingrese el DNI del pasajero: ' . "\n";
        $dniPasajero = trim(fgets(STDIN));
        if (!is_int($dniPasajero)){
            //Verifica si se ingresó un dato de 7 u 8 numeros
            if (verificaFormatoDNI($dniPasajero)){
                echo 'El DNI ingresado es invalido, intente nuevamente' . "\n";
                $ciclo = true;
            } else {
                //Verifica si el pasajero ya fueron pedidos por consola pero no ingresados todavía, para no repetir registros
                $existe = recorrePasajeros($dniPasajero,$pasajeros);
                if ($existe){
                    echo 'El DNI ingresado ya se encontraba cargado, intente con otro'. "\n";
                    $ciclo = true;
                }
                }
        } else {
            echo 'No se ingresó un DNI valido, intente nuevamente'. "\n";
            $ciclo = true;
        }
    }while($ciclo);
    return $dniPasajero;
}

function recorrePasajeros($dniPasajero,$pasajeros){
    $i = 0;
    $encontro = false;
    while($i < count($pasajeros) && !$encontro){
        $encontro = $pasajeros[$i]->getDni() == $dniPasajero;
        $i++;
    }
    return $encontro;
}

/** Verifica que se ingrese algo y no quede vacío
*@param string $stringAMostrar
*@return $dato 
*/
function verificaIngreso($stringAMostrar){
    do{
        echo $stringAMostrar;
        $dato = trim(fgets(STDIN));
    }while(empty($dato));
    return $dato;
}

/** Esta función se encarga de realizar la carga de los pasajeros 
 *@param int $cantMax es la cantidad máxima de pasajeros que van en un  viaje
 *@param Viaje $viaje
 *@return array $pasajeros */
function cargaPasajeros($cantMax){
    $pasajeros = array();
    do {
    if (count($pasajeros) < $cantMax){
        $dniPasajero = verificaDNI($pasajeros);
        $nombrePasajero = verificaIngreso("Ingrese el nombre del pasajero: \n");
        $apellidoPasajero = verificaIngreso("Ingrese el apellido del pasajero: \n");
        $datosPasajero = new Pasajero($dniPasajero, $nombrePasajero, $apellidoPasajero);
        array_push($pasajeros, $datosPasajero);
        $respuesta = pregunta();
    }else{
            echo 'No se pueden ingresar más pasajeros, ha llegado a la cantidad máxima' . "\n";
            $respuesta = false;
        } 
    }while($respuesta);
    return $pasajeros;
}
    /* Esta función se encarga de realizar la carga de los pasajeros cuando ya hay datos cargados previamente
    @param int $cantMax es la cantidad máxima de pasajeros que van en un  viaje
    @param array $pasajeros
     @return array $pasajeros */
function cargaPasajeros2($viaje, $cantMax){
        $pasajeros = $viaje->getPasajeros();
        do {
            if (count($pasajeros) < $cantMax){
            $dniPasajero = verificaDNI($pasajeros);
            $nombrePasajero = verificaIngreso("Ingrese el nombre del pasajero: \n");
            $apellidoPasajero = verificaIngreso("Ingrese el apellido del pasajero: \n");
            $datosPasajero = new Pasajero($dniPasajero,$nombrePasajero,$apellidoPasajero);
            array_push($pasajeros, $datosPasajero);
            $respuesta = pregunta(); 
        }else{
        echo 'No se pueden ingresar más pasajeros, ha llegado a la cantidad máxima' . "\n";
        $respuesta = false;
        } 
        }while($respuesta);
        return $pasajeros;
}
/*Esta función se encarga de preguntarle al usuario si quiere ingresar
    otro pasajero y para cuando recibe una respuesta valida.
    @return boolean $ingresoUsuario */
function pregunta(){
    
    $ciclo = true;
    do{
    echo 'Desea ingresar otro pasajero? ingrese si o no' . "\n";
    $respuesta = trim(fgets(STDIN));
    $respuesta = strtolower($respuesta);
   
    if ($respuesta== 'si' || $respuesta == 'no'){
        $ciclo = false;
        $ingresoUsuario = $respuesta== 'si' ? true : false;
    } else {
        echo 'Ingreso una respuesta incorrecta, intente nuevamente.' . "\n";
    }
    }while($ciclo);
    return $ingresoUsuario;
}
/* Esta función se encarga de modificar el dato del viaje que se necesite, ya preguntado anteriormente
    @param Viaje $viaje 
    @param int $modificacion
    @return Viaje $viaje */
function modificarViaje($viaje, $modificacion){
    
    switch($modificacion){
        case 1: 
            echo "Ingrese el código de viaje nuevo: ";
            $nuevoCodViaje = trim(fgets(STDIN));
            $viaje->setCodViaje($nuevoCodViaje);
            break;
        case 2: 
            echo "Ingrese el destino nuevo: ";
            $nuevoDestino = trim(fgets(STDIN));
            $viaje->setDestino($nuevoDestino);
            break;
        case 3:
            echo "Ingrese la cantidad máxima de pasajeros nueva: ";
            $nuevoCantMax = trim(fgets(STDIN));
            $viaje->setCantMaximaPasajeros($nuevoCantMax);
            break;
    }
    return $viaje;
}  
/* Esta función se encarga de verificar que el dni ingresado cumpla con el formato de DNI y que se encuentre cargado
    @param int $dniModificar
    @param array $pasajerosCargados 
    @return boolean $encontrado */
function compruebaDNIAModificar($dniModificar,$viaje){
  
    if (!verificaFormatoDNI($dniModificar)){
        $existe = $viaje->buscaPasajero($dniModificar);
        $encontrado = ($existe <> -1);
    }
    return $encontrado;
}
 /** Esta función se encarga de modificar el dato del pasajero, depende del parámetro modificación
 *   @param int $dniPasajero
 *   @param int $modificacion
 */
function modificarPasajero($dniPasajero,$modificacion,$viaje){
    switch($modificacion){
        case 1: 
            $nuevoDNI = verificaIngreso("Ingrese el nuevo DNI: \n");
            $viaje->modificarDniPasajero($dniPasajero, $nuevoDNI);
            break;
        case 2: 
            $nuevoNombre = verificaIngreso("Ingrese el nuevo nombre: \n");
            $viaje->modificarNombrePasajero($dniPasajero, $nuevoNombre);
            break;
        case 3:
            $nuevoApellido = verificaIngreso("Ingrese el nuevo apellido: \n");
            $viaje->modificarApellidoPasajero($dniPasajero, $nuevoApellido);
            break;
    }
    return $viaje;
}
/*Esta función se encarga de eliminar pasajeros, busca por el DNI 
    @param int $dniAEliminar
    @param array $pasajerosEliminar
    @return array $pasajerosEliminar */
function eliminaPasajeros($dniAEliminar,$pasajerosEliminar){
    
    $i = 0;
    $encontrado = false;
    while($i < count($pasajerosEliminar) && !$encontrado){
        $encontrado = $pasajerosEliminar[$i]->getDni() == $dniAEliminar;
        $i++;
    }
    array_splice($pasajerosEliminar,$i-1,1);
    return $pasajerosEliminar;
}
/*Esta función se encarga de mostrar los datos del pasajero con el dni pasado por parámetro
    @param int $dniAMostrar
    @param array $pasajerosCargados*/
function muestraPasajero($dniAMostrar,$pasajerosCargados){
    
    $i = 0;
    $encontrado = false;
    while($i < count($pasajerosCargados) && !$encontrado){
        $encontrado = $pasajerosCargados[$i]->getDni() == $dniAMostrar;
        if ($encontrado){
            echo "Pasajero: " . ($i+1) . "\n";
            echo $pasajerosCargados[$i]."\n";
        } else {
        $i++;}
    }
}
/** Esta función se encarga de crear el objeto Responsable
   * @return Responsable $responsable*/
function cargaResponsable(){
    $numEmpleado = verificaIngreso("Ingrese el número de empleado del responsable: \n");
    $numLicencia = verificaIngreso("Ingrese el número de licencia del responsable: \n");
    $nombre = verificaIngreso("Ingrese el nombre del responsable: \n");
    $apellido = verificaIngreso("Ingrese el apellido del responsable: \n");
    $responsable = new ResponsableV($numEmpleado,$numLicencia,$nombre,$apellido);
    return $responsable;
}
function modificaResponsable($responsable,$modificacion){
    switch($modificacion){
        case 1:
            $numEmpleado = verificaIngreso("Ingrese el nuevo número de empleado: \n");
            $responsable->setNumEmpleado($numEmpleado);
            break;
        case 2:
            $numLicencia = verificaIngreso("Ingrese el nuevo número de licencia: \n");
            $responsable->setNumLicencia($numLicencia);
            break;
        case 3:
            $nombre = verificaIngreso("Ingrese el nuevo nombre: \n");
            $responsable->setNombre($nombre);
            break;
        case 4:
            $apellido = verificaIngreso("Ingrese el nuevo apellido: \n");
            $responsable->setApellido($apellido);
            break;        
    }
    return $responsable;
}
/*------- PROGRAMA PRINCIPAL -------*/
$ingresaUsuario = llamaMenu();
do {
    switch($ingresaUsuario){
        case 1: 
            $codViaje = verificaIngreso("Ingrese el código del viaje: \n");
            $des = verificaIngreso("Ingrese el destino: \n");;
            $cantMax = verificaIngreso("Ingrese la cantidad máxima de pasajeros: \n");;
            $pasajeros = cargaPasajeros($cantMax);
            $responsable = cargaResponsable();
            $viaje = new Viaje($codViaje, $des, $cantMax, $pasajeros,$responsable);
            $ingresaUsuario = llamaMenu();
            break;
        case 2: 
            if (!empty($viaje)){
                do {
                echo 'Ingrese qué dato quiere modificar: ' . "\n";
                echo '1) Código de viaje' . "\n";
                echo '2) Destino ' . "\n";
                echo '3) Cantidad máxima de pasajeros '."\n";
                $modificacion = trim(fgets(STDIN));
                } while(($modificacion<1  || $modificacion>4) || !is_numeric($modificacion));
                $viaje = modificarViaje($viaje, $modificacion);
                $ingresaUsuario = llamaMenu();
            } else {
                echo "Todavía no ha ingresado un viaje para poder modificar, presione la opción 1 para hacerlo" . "\n";
                $ingresaUsuario = llamaMenu();
            }
            break;
        case 3: 
            if (!empty($viaje)){
                echo $viaje;
                $ingresaUsuario = llamaMenu();
            } else {
                echo "Todavía no ha ingresado un viaje para poder mostrar, presione la opción 1 para hacerlo" . "\n";
                $ingresaUsuario = llamaMenu();
            }
            break;
        case 4:
            if (!empty($viaje)){
            $pasajerosNuevo = cargaPasajeros2($viaje, $viaje->getCantMaximaPasajeros());
            $viaje->setPasajeros($pasajerosNuevo);
            echo 'Se ha ingresado el nuevo pasajero correctamente' . "\n";
            $ingresaUsuario = llamaMenu();
            break;} else {
                echo "Todavía no ha ingresado un viaje para poder mostrar, presione la opción 1 para hacerlo" . "\n";
                $ingresaUsuario = llamaMenu();
            }
        case 5:
            if (!empty($viaje)){
                $pasajerosModificar = $viaje->getPasajeros();
                do {
                echo "Ingrese el DNI del pasajero a modificar: \n";
                $dniAModificar = trim(fgets(STDIN));
                if (!compruebaDNIAModificar($dniAModificar,$viaje)){
                    echo 'DNI incorrecto, ingrese nuevamente' . "\n";
                    $ciclo = true;
                } else {
                    $ciclo = false;
                }
                }while(empty($dniAModificar) || $ciclo);
                do {
                echo "¿Qué dato desea modificar? \n";
                echo "1) Documento de identidad \n";
                echo "2) Nombre \n";
                echo "3) Apellido \n";
                $modificacion = trim(fgets(STDIN));
                }while(empty($modificacion) || !is_numeric($modificacion));
                $viaje = modificarPasajero($dniAModificar,$modificacion,$viaje);
                echo 'Se ha modificado el pasajero correctamente' . "\n";
                $ingresaUsuario = llamaMenu();
            } else {
                echo 'Todavía no ha ingresado un viaje para poder mostrar, presione la opción 1 para hacerlo' . "\n";
                $ingresaUsuario = llamaMenu();
            }
        break;
        case 6: 
            if(!empty($viaje)){
                $pasajerosEliminar = $viaje->getPasajeros();
                do {
                echo "Ingrese el DNI del pasajero a eliminar: \n";
                $dniAEliminar = trim(fgets(STDIN));
                if (!compruebaDNIAModificar($dniAEliminar,$viaje)){
                    echo 'DNI incorrecto, ingrese nuevamente' . "\n";
                    $ciclo = true;
                } else {
                    $ciclo = false;
                }
                }while(empty($dniAEliminar) || $ciclo);
                $viaje->eliminaPasajero($dniAEliminar);
                echo 'Se ha eliminado el pasajero correctamente' . "\n";
                $ingresaUsuario = llamaMenu();
            } else{
                echo 'Todavía no ha ingresado un viaje para poder mostrar, presione la opción 1 para hacerlo' . "\n";
                $ingresaUsuario = llamaMenu();
            }
        break;
        case 7:
            if(!empty($viaje)){
                $pasajerosCargados = $viaje->getPasajeros();
                do {
                echo "Ingrese el DNI del pasajero a mostrar: \n";
                $dniAMostrar = trim(fgets(STDIN));
                if (!compruebaDNIAModificar($dniAMostrar,$viaje)){
                    echo 'DNI incorrecto, ingrese nuevamente' . "\n";
                    $ciclo = true;
                } else {
                    $ciclo = false;
                }
                }while(empty($dniAMostrar) || $ciclo);
                muestraPasajero($dniAMostrar,$pasajerosCargados);
                $ingresaUsuario = llamaMenu();
            } else {
                echo 'Todavía no ha ingresado un viaje para poder mostrar, presione la opción 1 para hacerlo' . "\n";
                $ingresaUsuario = llamaMenu();
            }
        break;
        case 8:
            if (!empty($viaje)){
                do {
                    echo "Ingrese que desea modificar: \n 1) Nro de empleado \n 2) Nro de licencia \n 3) Nombre \n 4) Apellido \n";
                    $modificacion = trim(fgets(STDIN));
                }while($modificacion<0 || $modificacion>4);
                $responsable = $viaje->getResponsable();
                $responsable =modificaResponsable($responsable,$modificacion);
                $viaje->setResponsable($responsable);
                $ingresaUsuario = llamaMenu();
            }
            else {
                echo 'Todavía no ha ingresado un viaje para poder mostrar, presione la opción 1 para hacerlo' . "\n";
                $ingresaUsuario = llamaMenu();
            }
        break;
    }
} while($ingresaUsuario <> 0);
?>