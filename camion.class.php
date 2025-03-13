<?php
class Camion extends Ruedas4 {
    private $logitud;
    public function __construct($color, $peso, $longitud, $numPuertas){
        $this->color = Vehiculo::setColor($color);
        $this->peso = Vehiculo::setPeso($peso);
        $this->longitud = $longitud;
        $this->numPuertas = Ruedas4::setNumPuertas($numPuertas);
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function añadirRemolque($longitudRemolque){
        $logitud=$this->logitud;
        $logitudTotal = $logitud + $longitudRemolque;
        $this->logitud=$logitudTotal;
    }
}