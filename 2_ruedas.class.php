<?php
class Ruedas2 extends Vehiculo{
    private $cilindrada;
    public function setCilindrada($c){
        $this->cilindrada=$c;
    }
    public function getCilindrada(){
        return $this->cilindrada;
    }
    public function ponerGasolina($litros){
        $pesoTotal=Vehiculo::getPeso()+$litros;
        Vehiculo::setPeso($pesoTotal);
    }
    public function añadirPersona($pesoPersona){
        $pesoTotal=Vehiculo::getPeso()+$pesoPersona+2;
        Vehiculo::setPeso($pesoTotal);
    }
}