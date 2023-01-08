<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Datos_del_Tutor_y_Alumno</title>
	
</head>
<style>
body{
	background-image: url(1.jpeg);
	font-family: Arial;
	font-size: 50px;
	background-attachment: fixed;
		}
}

#main-container{
	margin: 100px auto;
	width: 600px;
}

table{
	background-color: white;
	text-align: left;
	border-collapse: collapse;
	width: 100%;
	box-shadow: 0 0 20px 1px rgba(0,0,0,0.3);
	font-size:20px;
	border-radius: 5px;
}

th, td{
	padding: 20px;
}

thead{
	background-color: #246355;
	border-bottom: solid 5px #0F362D;
	color: white;
}

tr:nth-child(even){
	background-color: #ddd;
}

tr:hover td{
	background-color: #369681;
	color: white;
}
	}
</style>

<body>
	

<?php
	require_once 'conexion.php';
//recibe variables de tutores
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$phone = $_POST['phone'];
$domicilio = $_POST['domicilio'];
$fecha_nac = $_POST['fecha_nac'];
$sexo = $_POST['sexo'];
$ocupacion_tutor = $_POST['ocupacion_t'];
//recibe variables de alumnos
$nombre_alumno = $_POST['nombre_alumno'];
$apellido_alumno = $_POST['apellido_alumno'];
$dni_alumno = $_POST['dni_alumno'];
$sexo_alumno = $_POST['sexo_alumno'];
$fecha_nac_alumno = $_POST['fecha_nac_alumno'];
//PRUEBAS
//PRUEBAS
//PRUEBAS
$date = date("Y");
	echo"<p>";
//PRUEBAS
//PRUEBAS
//PRUEBAS
//insertamos los datos
$consulta2="SELECT MAX(id_alumno) as maximo FROM alumno";
$ejecucion10=$conexion->query($consulta2);

$cantidad = mysqli_fetch_assoc($ejecucion10);


if ($cantidad['maximo'] >= 240) {
	echo "Lo sentimos ya los cupos de alumnos ha sido agotado totalmente. Si aun desea inscribir al alumno en esta Institucion, puede ir a esta, ya que puede que algunos alumnos dejen cupos libres";
}else{

//insertamos los datos
$sql="insert into personas(nombre_persona, apellido_persona, dni_personas, telefono, direccion_alumno, fecha_nac_personas, sexo_personas) values('$nombre', '$apellido', '$dni', $phone, '$domicilio', '$fecha_nac', '$sexo')";
//ejecutamos la consulta
$ejecucion=$conexion->query($sql);

$ultimo_id_personas = mysqli_insert_id($conexion);

//insertamos los datos
 $sql2 = "insert into ocupacion_tutores (ocupacion_tutor) values 
 ('$ocupacion_tutor')";
//ejecutamos la segunta consulta
 $ejecucion2 = $conexion->query($sql2);
//obtenemos la ultima id de la consulta anterior
 $ultimo_id	= mysqli_insert_id($conexion);
//insertamos la tercera consulta
 
 //insertamos la tercera consulta
 $sql4 = "insert into alumno (nombre_alumno, apellido_alumno, dni_alumno, sexo_alumno, fecha_nac_alumno) values 
 ('$nombre_alumno', '$apellido_alumno', '$dni_alumno', '$sexo_alumno', '$fecha_nac_alumno')";
 //ejecutamos la cuarta consulta
 $ejecucion4 = $conexion->query($sql4);

 $ultimo_id_alumno = mysqli_insert_id($conexion);

 $sql3 = "insert into tutor (id_personas, id_ocupacion_tutor, id_alumno) values 
 ($ultimo_id, $ultimo_id_alumno, $ultimo_id_personas)";
 //ejecutamos la tercera consulta
 $ejecucion3 = $conexion->query($sql3);

 $sql5 = "insert into requisitos (id_alumno) values 
 ($ultimo_id_alumno)";
 //ejecutamos la tercera consulta
 $ejecucion5 = $conexion->query($sql5);

 $sql6 = "insert into detalle_requisitos (id_alumno) values 
 ($ultimo_id_alumno)";
 //ejecutamos la tercera consulta
 $ejecucion6 = $conexion->query($sql6);
 
 $sql6 = "UPDATE detalle_requisitos SET id_alumno='$ultimo_id_alumno' WHERE id_det_requisitos=$ultimo_id_alumno";
 //ejecutamos la tercera consulta
 $ejecucion6 = $conexion->query($sql6);

 $sql7 = "UPDATE requisitos SET id_det_requisitos='$ultimo_id_alumno' WHERE id_alumno=$ultimo_id_alumno";
 //ejecutamos la tercera consulta
 $ejecucion7 = $conexion->query($sql7);

 $sql8 = "UPDATE detalle_requisitos SET id_requisitos='$ultimo_id_alumno' WHERE id_alumno=$ultimo_id_alumno";
 //ejecutamos la tercera consulta
 $ejecucion8 = $conexion->query($sql8);

 $sql9 = "UPDATE requisitos SET ciclo_lectivo='$date' WHERE id_alumno=$ultimo_id_alumno";
 //ejecutamos la tercera consulta
 $ejecucion9 = $conexion->query($sql9);

 //verifico que los datos se hayan guardados
 if (!$ejecucion and !$ejecucion2 and !$ejecucion3 and !$ejecucion4 and !$ejecucion5 and !$ejecucion6 and !$ejecucion7 and !$ejecucion8 and !$ejecucion9) {
	echo "hubo un error al guardar los datos";
}else{
    echo "los datos se han guardado corretamente";

}
	
	echo "se pre-inscribio correctamente";

}

		?>
<div id="main-container">

<table>
	<tr>
		<td>Nombre</td>
		<td><?php echo $nombre ?></td>
	</tr>
	<tr>
		<td>Apellido</td>
		<td><?php echo $apellido ?></td>
	</tr>
	<tr>
		<td>DNI</td>
		<td><?php echo $dni ?></td>
	</tr>
	<tr>
		<td>N°Telefono</td>
		<td><?php echo $phone ?></td>
	</tr>
	<tr>
		<td>Domicilio</td>
		<td><?php echo $domicilio ?></td>
	</tr>
	<tr>
		<td>Fecha de nacimiento</td>
		<td><?php echo $fecha_nac ?></td>
	</tr>
	<tr>
		<td>Sexo</td>
		<td><?php echo $sexo ?></td>
	</tr>
	<tr>
		<td>Ocupacion</td>
		<td><?php echo $ocupacion_tutor ?></td>
	</tr>
	<tr>
		<td>Numero de turno</td>
		<td><?php echo $cantidad['maximo'] ?></td>
	</tr>
	<tr>
		<td>Ciclo lectivo</td>
		<td><?php echo $date ?></td>
</table>
<form action="property-details.html" method="post">
<input type="submit" value="Volver atras">
	</form>
</div>
</body>
</html>
