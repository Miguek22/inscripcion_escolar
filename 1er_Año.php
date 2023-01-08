<meta charset="utf-8">
<title>Documento sin titulo</title>
<style>
	table,tr,td{
		border:solid;
		border-radius:5px;
		border-color:springgreen;
		background:rgba(13,181,174,1.00);
		width: 5px;
		padding: 3px 20px 3px 20px;
		margin: auto;
		font-size:20px;
		background-position: center;
		box-shadow: 0 0 20px 1px rgba(0,0,0,0.3);
	}
	h1{
		color:deeppink;
		text-align:center;
		font-size: 50px;
	}
	h3{
		color:darkorange;
		text-align:center;
		font-size: 30px;
	}
	body{
		background-image: url(../../../Users/usuario/Downloads/160670_wallpapers-4k-ultra-hd-para-pc.jpg);
		background-size: 100% 100%;
		background-attachment: fixed;
		background-repeat: no-repeat;
	}
	a{
		font:bold 15px Verdana;
		text-decoration:none;
		color:white;
		border:1px solid white;
		padding:2px 20px 2px 20px;
		border-radius:5px;
		transition:background .5s,color .5s;
		margin:auto;
		
	}
	a:hover{
		background:#000000;
		color:chartreuse;
	}
	input{
		border-radius:5px;
	}
</style>
</head>

<body> 
<h1>Datos 1er Año</h1>
<?php
	//recibo los datos del formulario y asigno a variables
	$nombre=$_POST["nom"];
	$apellido=$_POST["ape"];
	$DNI=$_POST["dni"];
	$Telefono=$_POST["tel"];
	//$metodo_pago=$_POST["metodo_pago"];
	//con un switch asignarle el monto y la leyende correpondiente a cada option del select del formulario
	
?>
<table>
<tr>
	<td>Nombre:</td>
	<td><?php echo $nombre ?></td>
</tr>
	<tr>
		<td>Apellido:</td>
		<td><?php echo $apellido ?></td>
	</tr>
	
	<tr>
		<td>DNI:</td>
		<td><?php echo $DNI ?></td>
	</tr>
	<tr>
	<td>N°Telefono:</td>
		<td><?php echo $Telefono ?></td>
	</tr>
	<tr>
>	</table>
	
	
	</table>
	<p>
	<th><td><a href="../../../Users/usuario/Downloads/Examen.html">Volver atras</a></td><th></th>
</body>
</html>