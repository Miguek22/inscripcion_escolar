<?php
$usuario="root";
$contra="";
$base_datos="inscripciones_1er_anio";
$equipo="localhost";
$conexion= new mysqli ($equipo, $usuario, $contra, $base_datos);
if ($conexion->connect_error){
    die ("Fallo en la conexion: (" . $mysquli ->mysquli_connect_errno(). ")" . $mysquli->msyquli_connect_errno());

}
?>