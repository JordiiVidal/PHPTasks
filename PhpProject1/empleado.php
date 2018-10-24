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
        return " Sueldo Neto ".$this->sueldo*0.85;
    }
}

$empleado01 = new Empleado("pedro",222);
//$empleado01->nombre = "Pol";
$empleado01->dni = "771296213G";
//$empleado01->sueldo = 20000;

$empleado02 = new Empleado("pedra");
//$empleado01->nombre = "Pol";
$empleado02->dni = "771296213G";
//$empleado02->sueldo = 20000;

echo '<pre>';
echo $empleado01->varEmpleado();
echo $empleado01->sueldoNeto();
echo '<pre>';
echo '<pre>';
echo $empleado02->varEmpleado();
echo $empleado02->sueldoNeto();
echo '<pre>';
echo '<pre>';
var_dump($empleado02);
echo '</pre>';

class Cd extends Empleado{
    public $longitud;
    
}
$nuevoCd = new Cd('Noriel');
$nuevoCd->longitud = 90;
var_dump($nuevoCd);




