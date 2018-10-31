<?php

abstract class GeometricoAbstract {
    
    abstract function area();
    
}
class Cuadrado extends GeometricoAbstract{
    
    public $lado;
            
    function __construct($lado) {
        $this->lado = $lado;
    }
            
    function area() {
        return $this->lado*$this->lado;
        
    }
}

//$a = new Cuadrado(7);

//echo $a->area();

class Circulo extends GeometricoAbstract{
    
    public $radio;
    
    function __construct($radio) {
        $this->radio = $radio;
    }
    
    function area() {
        return (pi()*pow($this->radio,2));
    }
}

$circulo = new Circulo(20);


echo $circulo->area();
