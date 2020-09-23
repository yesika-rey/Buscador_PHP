<?php

$host="localhost";
$usuario="root";
$contraseña="root";
$base="data-1.json";

$conexion= new mysqli($host, $ciudad, $tipo, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$ciudad=$_POST['ciudad'];
$tipo=$_POST['tipo'];


////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{



	if (empty($_POST['tipo']))
	{
		$where="where nombre like '".$ciudad."%'";
	}

	else if (empty($_POST['ciudad']))
	{
		$where="where tipo='".$tipo."'";
	}

	else
	{
		$where="where ciudad like '".$ciudad."%' and tipo='".$tipo."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$Ciudad="SELECT * FROM Ciudad $where $limit";
$resCiudad=$conexion->query($Ciudad);
$resTipo=$conexion->query($tipos);

if(mysqli_num_rows($ciudad)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
						while ($tipo = $restipo->fetch_array(MYSQLI_BOTH))
						{
							echo '<option value="'.$tipo['tipo'].'">'.$tipo['tipo'].'</option>';
						}

								?>
			
