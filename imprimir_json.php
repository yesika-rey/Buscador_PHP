<?php

$data=file_get_contents("data-1.json");
$propiedades=json_decode($data,true);
$filtro_ciudad="New York";
$filtro_tipo="Casa";
$precios="24000:40000";
$precios=explode(":",$precios);
$precio_bajo=$precios[0];
$precio_alto=$precios[1];


for($i=0;$i<count($propiedades);$i++) {

     $ciudad=$propiedades[$i]["Ciudad"];
     $tipo=$propiedades[$i]["Tipo"];
     $precio=$propiedades[$i]["Precio"];
     $precio=str_replace("$","",$precio);
     

if($ciudad==$filtro_ciudad && $tipo==$filtro_tipo){

  if($precio<$precio_alto && $precio>$precio_bajo){


   echo $ciudad;
   echo $tipo;
   echo $precio;  
}

}
   
	
}



?>