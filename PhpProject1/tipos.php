<?php

class foo{
    public $nombre;
}
$a = "hola";
$b = 5;
$c = 5.6;
$d = [1,2,3];
$e =new foo();

echo is_string($a);
echo is_int($b);
echo is_float($c);
echo is_array($d);
echo is_object($e);
//php no tipado
//tipos solo estan en las variables de funciones
function foo(string $cadena){
    echo $cadena;
}
foo($a);
foo($b);

splita($d);

function splita(array $valores){
    echo '<hr/>';
    foreach ($valores as $valor){
        echo $valor."|";
    }
    foreach ($valores as $c=>$v){//clave valor
         $v.'|';
    }
    echo '<hr/>';
    echo implode("|", $valores);    
}
echo '<hr/>';
$asociativo = ['nombre'=>'Juan','sueldo'=>1000,'departamento'=>'contsbilidad'];
foreach ($asociativo as $c=>$v){
    echo $c.' - '.$v;
}
echo '<hr/>';

echo mayores(3, 3);

function mayores(int $a,int $b):int{//:parametros de salida
    if($a > $b){
        return $a;
    }elseif ($b > $a) {
        return $b;
    }else{
        return $a+$b;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

