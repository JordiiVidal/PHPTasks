<?php
    class Empleado{

        public $nombre;
        public $dni;
        public $sueldo;

        function __construct($nombre,$sueldo=1000) {
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }
        function varEmpleado(){
            return "Nombre ".$this->nombre." DNI ".$this->dni;
        }
        function sueldoNeto(){
            return $this->sueldo*0.85;
        }
    }
    
    class Administrativo extends Empleado{
        public  $antiguedad;

        function __construct($nombre,$antiguedad ,$sueldo = 1000) {
            parent::__construct($nombre, $sueldo);
            $this->antiguedad = $antiguedad;
        }
        function sueldoNeto() {
            return parent::sueldoNeto()+(7*$this->antiguedad);  
        }
    }
    class Comercial extends Empleado{
        public  $comision;
        public $ventas;
        
        function __construct($nombre, $comision = 0, $ventas = 0,$sueldo = 1000) {
            parent::__construct($nombre, $sueldo);
            $this->comision = $comision;
            $this->ventas = $ventas;
        }  
        function sueldoNeto() {
            return parent::sueldoNeto()+($this->ventas*$this->comision);
        }
    }
    
    $comercial01  = new Comercial('pedro');
    $administrativo01 = new Administrativo('lolo', 100);
    var_dump($comercial01);
    echo $comercial01->sueldoNeto();
    echo '<hr>';
    var_dump($administrativo01);
    echo $administrativo01->sueldoNeto();
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

