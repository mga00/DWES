<?php
class Ruedas4 extends Vehiculo{
    private $numPuertas;
    public function repintar($color){
        Vehiculo::setColor($color);
    }
    public function getNumPuertas(){
        return $this->numPuertas;
    }
    public function setNumPuertas($numPuertas1){
        $this->numPuertas=$numPuertas1;
    }
    public function añadir_persona($peso_persona){
        $pesoTotal=Vehiculo::getPeso()+$peso_persona;
        Vehiculo::setPeso($pesoTotal);
    }
}