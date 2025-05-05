<?php
abstract class Vehiculo{
    private $color;
    private $peso;
    public function __construct($color, $peso){
        $this->color=$color;
        $this->peso=$peso;
    }
    public function circula(){
        echo "El cehículo circula\n";
    }
    public function añadir_persona($peso_persona){
        $peso=$this->peso;
        $pesoTotal = $peso + $peso_persona;
        $this->peso=$pesoTotal;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->peso=$peso;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color1){
        $this->color=$color1;
    }
    public static function verAtributo($vehiculo){//como añado que se espere un objeto
        echo "Color: ".$vehiculo->getColor()."<br>";
        echo "Peso: ".$vehiculo->getPeso()." kg<br>";
        if (property_exists($vehiculo, "numPuertas")) {
            echo "Numero de puertas: ".$vehiculo->getNumPuertas()."<br>";
        }
        if (property_exists($vehiculo, "cilindrada")) {
            echo "Cilindrada: ".$vehiculo->getCilindrada()."<br>";
        }
        if (property_exists($vehiculo, "longitud")) {
            echo "Longitud del vehiculo: ".$vehiculo->getLongitud()." metros<br>";
        }
        if (property_exists($vehiculo, "getNumCadenasNieve")) {
            echo "Numero de cadenas para la nieve: ".$vehiculo->getNumCadenasNieve();
        }
    }
}