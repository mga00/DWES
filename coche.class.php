<?php
include('4_ruedas.class.php');
class Coche extends Ruedas4 {
    //preguntar porque el color del coche no se cambia
    private $numCadenasNieve;
    public function añadirCadenasNieve($num){
        $numCadenasNieve=$this->numCadenasNieve;
        $numCadenasNieveTotal = $numCadenasNieve + $num;
        $this->numCadenasNieve=$numCadenasNieveTotal;
    }
    public function quitarCadenasNieve($num){
        $numCadenasNieve=$this->numCadenasNieve;
        $numCadenasNieveTotal = $numCadenasNieve - $num;
        $this->numCadenasNieve=$numCadenasNieveTotal;
    }
    public function getNumCadenasNieve(){
        return $this->numCadenasNieve;
    }
}