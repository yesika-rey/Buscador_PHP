<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="css/index.css">
  <title>Formulario</title>
</head>

<body background="img/home.jpg">
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form action="index.php" method="get" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field">
            <label for="selectCiudad">Ciudad:</label>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <option value="New York">New York</option>
              <option value="Orlando">Orlando</option>
              <option value="Los Angeles">Los Angeles</option>
              <option value="Houston">Houston</option>
              <option value="Washington">Washington</option>
              <option value="Miami">Miami</option>

              </select>
          </div>
          <div class="filtroTipo input-field">
            <label for="selecTipo">Tipo:</label><br>
            <select name="tipo" id="selectTipo">
              <option value="" selected>Elige un tipo</option>
              <option value="Apartamento">Apartamento</option>
              <option value="Casa">Casa</option>
              <option value="Casa de Campo">Casa de campo</option>

            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" name="buscar" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>

    <div class="colContenido">
    <form action="index.php" method="get">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <div class="divider"></div>
        <button type="submit" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
      </div>
</form>
<!-- modelo de etiquetas para cada propiedad resultante del filtro 
<div class="colContenido">
<div class="tituloContenido">
<div class="itemMostrado">
<img src="img/home.jpg">
<ul>
<p><strong>Direccion:</strong>#34-5675</p>
<p><strong>Ciudad:</strong>New York </p>
<p><strong>Telefono:</strong>747474</p>
<p><strong>Codigo Postal:</strong>8494 </p>
<p><strong>Tipo:</strong>Casa </p>
<p><strong>Precio:</strong></p> <p class="precioTexto">59999</p>
</ul>
</div>
</div>
</div>

-->

<?php

if(isset($_GET['todos'])){
  $data=file_get_contents("data-1.json");
  $propiedades=json_decode($data,true);


for($i=0;$i<count($propiedades);$i++) {

     $ciudad=$propiedades[$i]["Ciudad"];
     $tipo=$propiedades[$i]["Tipo"];
     $precio=$propiedades[$i]["Precio"];
     $direccion=$propiedades[$i]["Direccion"];
     $codigo_postal=$propiedades[$i]["Codigo_Postal"];
     $telefono=$propiedades[$i]["Telefono"];

     //$precio=str_replace("$","",$precio);


//imprimimos
echo "<div class='colContenido'>
<div class='tituloContenido'>
<div class='itemMostrado'>
<img src='img/home.jpg'>
<ul>
<p><strong>Direccion:</strong>".$direccion."</p>";

echo "<p><strong>Ciudad:</strong>".$ciudad."</p>";
echo"<p><strong>Telefono:</strong>".$telefono."</p>";
echo"<p><strong>Codigo Postal:</strong>".$codigo_postal."</p>";
echo"<p><strong>Tipo:</strong>".$tipo."</p>";
echo "<p><strong>Precio:</strong></p> <p class='precioTexto'>"."$".$precio."</p>";
echo"</ul>
</div>
</div>
</div>";



}

}



if(isset($_GET['buscar'])){


$data=file_get_contents("data-1.json");
$propiedades=json_decode($data,true);
$filtro_ciudad=$_GET['ciudad'];
$filtro_tipo=$_GET['tipo'];
$precios=$_GET['precio']; // 200;80000

$precios=explode(";",$precios);

$precio_bajo=$precios[0];
$precio_alto=$precios[1];


for($i=0;$i<count($propiedades);$i++) {

     $ciudad=$propiedades[$i]["Ciudad"];
     $tipo=$propiedades[$i]["Tipo"];
     $precio=$propiedades[$i]["Precio"];
     $direccion=$propiedades[$i]["Direccion"];
     $codigo_postal=$propiedades[$i]["Codigo_Postal"];
     $telefono=$propiedades[$i]["Telefono"];
     $precio=str_replace("$","",$precio);


    

if($ciudad==$filtro_ciudad && $tipo==$filtro_tipo){

  if($precio<$precio_alto && $precio>$precio_bajo){


//imprimimos
echo "<div class='colContenido'>
<div class='tituloContenido'>
<div class='itemMostrado'>
<img src='img/home.jpg'>
<ul>
<p><strong>Direccion:</strong>".$direccion."</p>";

echo "<p><strong>Ciudad:</strong>".$ciudad."</p>";
echo"<p><strong>Telefono:</strong>".$telefono."</p>";
echo"<p><strong>Codigo Postal:</strong>".$codigo_postal."</p>";
echo"<p><strong>Tipo:</strong>".$tipo."</p>";
echo "<p><strong>Precio:</strong></p> <p class='precioTexto'>"."$".$precio."</p>";
echo"</ul>
</div>
</div>
</div>";
     

}

}else{
     if($ciudad==$filtro_ciudad && $filtro_tipo==""){
       if($precio<$precio_alto && $precio>$precio_bajo){
           //si la ciudad o el tipo en los filtros no es igual a alguno de los registros del json, entonces pregunta si la ciudad en algun registro es igual a la ciudad del filtro
          //de ser asi, pregunta si el precio esta en el rango elegido en el filtro del precio
        
             //imprimimos
echo "<div class='colContenido'>
<div class='tituloContenido'>
<div class='itemMostrado'>
<img src='img/home.jpg'>
<ul>
<p><strong>Direccion:</strong>".$direccion."</p>";

echo "<p><strong>Ciudad:</strong>".$ciudad."</p>";
echo"<p><strong>Telefono:</strong>".$telefono."</p>";
echo"<p><strong>Codigo Postal:</strong>".$codigo_postal."</p>";
echo"<p><strong>Tipo:</strong>".$tipo."</p>";
echo "<p><strong>Precio:</strong></p> <p class='precioTexto'>"."$".$precio."</p>";
echo"</ul>
</div>
</div>
</div>";


       }

     }elseif ($tipo==$filtro_tipo && $filtro_ciudad==""){
        
           if($precio<$precio_alto && $precio>$precio_bajo){

              //imprimimos
echo "<div class='colContenido'>
<div class='tituloContenido'>
<div class='itemMostrado'>
<img src='img/home.jpg'>
<ul>
<p><strong>Direccion:</strong>".$direccion."</p>";

echo "<p><strong>Ciudad:</strong>".$ciudad."</p>";
echo"<p><strong>Telefono:</strong>".$telefono."</p>";
echo"<p><strong>Codigo Postal:</strong>".$codigo_postal."</p>";
echo"<p><strong>Tipo:</strong>".$tipo."</p>";
echo "<p><strong>Precio:</strong></p> <p class='precioTexto'>"."$".$precio."</p>";
echo"</ul>
</div>
</div>
</div>";

          }
        }else{
           if($filtro_ciudad==""&& $filtro_tipo==""&&$precio<$precio_alto && $precio>$precio_bajo){
            //imprimimos
echo "<div class='colContenido'>
<div class='tituloContenido'>
<div class='itemMostrado'>
<img src='img/home.jpg'>
<ul>
<p><strong>Direccion:</strong>".$direccion."</p>";

echo "<p><strong>Ciudad:</strong>".$ciudad."</p>";
echo"<p><strong>Telefono:</strong>".$telefono."</p>";
echo"<p><strong>Codigo Postal:</strong>".$codigo_postal."</p>";
echo"<p><strong>Tipo:</strong>".$tipo."</p>";
echo "<p><strong>Precio:</strong></p> <p class='precioTexto'>"."$".$precio."</p>";
echo"</ul>
</div>
</div>
</div>";

           }
        }

     }
  
}
   
  
}








?>



    </div> 
  </div>

  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
