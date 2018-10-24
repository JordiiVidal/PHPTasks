<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class test{
    public $publica;
    private $private;
    protected $protected;
    private $nota;
            
    function __construct() {
        $this->private=3;
        $this->protected=3;
        $this->publica=3;
    }
    function getNota() {
        return $this->nota;
    }

    function setNota($nota) {
        if($nota<1 || $nota > 10){
            throw new Exception('entre 1 o 10 ');
        }else{
            $this->nota = $nota;   
        }
    }

        function getPrivada(){
        return $this->private;
    }
    function setPrivada($valor){
        if($valor<0){
            throw new Exception('dasd');
        }else{
            $this->private=$valor;   
        }
    }
    
}
class TestDerivada extends Test{
    function prueba(){
        return $this->protected;
    }
} 
try{
$a = new Test();
echo $a -> publica;//instancias solo publicas
//$a -> private;
echo $a->getPrivada();
$a->setPrivada(4);
echo $a->getPrivada();
}catch(Exception $ex){
    echo $ex->getMessage();
}