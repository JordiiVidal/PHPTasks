<?php


class Complejo {
    
    private $a;
    private $ai;
    
    public function __construct(float $a, float $ai) {
        $this->a = $a;
        $this->ai = $ai;
    }
    function getA() {
        return $this->a;
    }

    function getAi() {
        return $this->ai;
    }

    function sumar(Complejo $complejo){
        
    }
    function multiplicar(Complejo $complejo){
        
    }
    function igualar(Complejo $complejo){
        
    }
}
$c = new Complejo();
$c2 = new Complejo();