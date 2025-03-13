<?php
include('Vehiculo.class.php');
include('Coche.class.php');
include('Camion.class.php');
include('2_ruedas.class.php');
//$vehiculo=new Vehiculo("Morado", 1500);
//$vehiculo->circula();
//$vehiculo->añadir_persona(70);
//echo "y pesa ".$vehiculo->getPeso()."<br>";
$coche= new Coche("verde", 1400);
$coche->añadir_persona(65);
$coche->añadir_persona(65);
echo "El color del coche es verde y en nuevo peso es ".$coche->getPeso()
                                                                ."<br>";
$coche->repintar("rojo");
$coche->añadirCadenasNieve(2);
echo "Ahora el color del coche es ".$coche->getColor()
        ." y el numero de cadenas es ".$coche->getNumCadenasNieve()."<br>";
$vehiculo2Ruedas = new Ruedas2("negro", 120);
$vehiculo2Ruedas->añadir_persona(80);
$vehiculo2Ruedas->ponerGasolina(20);
echo "El color del vehiculo de dos ruedas es ".$vehiculo2Ruedas->
        getColor()." y el peso es ".$vehiculo2Ruedas->getPeso()."<br>";
$camion= new Camion("azul", 10000, 10, 2);
$camion->añadirRemolque(5);
$camion->añadir_persona(80);
echo "El camion es ".$camion->getColor().", su peso es de ".$camion->
getPeso().", tiene una longitud de ".$camion->getLongitud()
." metros y tiene ".$camion->getnumPuertas()." puertas.<br>";
$dosRuedas=new Ruedas2("rojo", 150);
$dosRuedas->añadir_persona(70);
echo "El peso total del dos ruedas rojo es ".$dosRuedas->getPeso();
$dosRuedas->setColor("verde");
$dosRuedas->setCilindrada(1000);
Vehiculo::verAtributo($dosRuedas);
$camion1= new Camion("blanco", 6000, 7, 2);
$camion1->añadir_persona(84);
$camion1->setColor("azul");
$camion1->setNumPuertas($camion1->getNumPuertas()+2);
Vehiculo::verAtributo($camion1);