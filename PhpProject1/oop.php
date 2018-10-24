<?php
    
class Producto{
    public $nombre;
    public $precio;
    
    function toString(){
        return $this->nombre." ".$this->precio;
    }
    function pvp(){
        return $this->precio*1.21;
    }
}

$a = new Producto();
$b = new Producto();
$c = new Producto();

$a->nombre = 'Tornilo';
$b->nombre = 'Tornilla';
$a->precio = 5000;
$b->precio = 800;
$a->nombre = $b->nombre;

$d=$a;//objeto referencia al mismo sitio

$d->nombre='belen';

echo $a->toString();

var_dump($a);//echo de objetos o arrays
var_dump($b);
var_dump($c);
var_dump($d);

echo '<hr/>';

echo $a->pvp();

echo '<hr/>';

imprimir($a);

    function imprimir(Producto $producto){
    echo 'El producto es '.$producto->nombre;
    echo ' ,precio '.$producto->precio;
}
echo '<hr/>';
echo masCaro($a, $b);
function masCaro(Producto $producto1, Producto $producto2){
    if(($producto1->precio)>($producto2->precio)){
        return $producto1->precio;
    }else{
        return $producto2->precio;
    }
}