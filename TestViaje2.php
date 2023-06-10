<?php
include_once "Viaje.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";
include_once "PasajeroNecesidadesEspeciales.php";
include_once "PasajeroVip.php";
include_once "BaseDatos.php";

$pasajero = new Pasajero(42605438, 'Abigail', 'Almiron',23, 65);
$pasajeroVip = new PasajeroVip(42605439, 'Camila', 'Almiron',36, 66,90, 334,60);
$pasajeroNecesidadesEspeciales = new PasajeroNecesidadesEspeciales(21879854, 'Juan', 'Almiron', 69, 5, true, true, true);

$responsable = new ResponsableV(78, 99, 'Silvia', 'Ortiz');

$viaje = new Viaje('33', 'Paraguay', '99', [],$responsable,99098);

$viaje->venderPasaje($pasajero);
$viaje->venderPasaje($pasajeroVip);
$viaje->venderPasaje($pasajeroNecesidadesEspeciales);





?>