<?php

use controller\Personas;
use controller\Motos;
use controller\Autos;
use controller\Articulos;

require_once realpath('./vendor/autoload.php');


echo "<br>";
echo "Tabla Personas";
echo "<br>";
echo "<br>";
//Tabla Personas

//Personas::insercion();
//Personas::actualizar_datos();
//Personas::eliminar();
Personas::obtener_datos();



echo "<br>";
echo "<br>";
echo "Tabla Motos";
echo "<br>";
echo "<br>";


//Motos::insercion();
//Motos::actualizar_datos();
//Motos::eliminar();
Motos::obtener_datos();


echo "<br>";
echo "<br>";
echo "Tabla Autos";
echo "<br>";
echo "<br>";


//Autos::insercion();
//Autos::actualizar_datos();
//Autos::eliminar();
Autos::obtener_datos();


echo "<br>";
echo "<br>";
echo "Tabla Articulos";
echo "<br>";
echo "<br>";


//Articulos::insercion();
//Articulos::actualizar_datos();
//Articulos::eliminar();
Articulos::obtener_datos();
echo "<br>";



?>