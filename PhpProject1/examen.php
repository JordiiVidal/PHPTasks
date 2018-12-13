<?php 

    class Alumno{

        public $nombre;

        public $apellido;

        public $edad;

        function __construct(string $apellido,$nombre = 'sin nombre'){//parametros por defecto siempre al final

            $this->nombre = $nombre;

            $this->apellido = $apellido;

            $this->edad = 21;

        }
        
    }
    class Vehiculo{

        public $marca;

        public $modelo;

        function __construct(string $marca, string $modelo){

            $this->marca = $marca;

            $this->modelo = $modelo;

        }

        function mostrar(){
            
            return $this->modelo;

        }
    }

    class Terrestre extends Vehiculo{

        public $ruedas;

        public function __construct($marca,$modelo,float $ruedas){
            parent::__construct($marca,$modelo);

            $this->ruedas = $ruedas;

        }

        function mostrar(){
            return parent::mostrar().' '.$this->ruedas;
        }


    }

    class Propiedad{
        
        public $public;
        protected $protected;
        private $private;

        function __construct(){

            $this->public = 'public';
            $this->protected = 'protected';
            $this->private = 'private';

        }
        function getPublica(){
            return $this->public;
        }
        function getProtected(){
            return $this->protected;
        }
        function getPrivate(){
            return $this->private;
        }
    }

    class PropiedadHija extends Propiedad{

        function __construct(){
            parent::__construct();
        }
        function getPrivate(){

            return $this->private;

        }
        function getProtected(){
            return $this->protected;
        }

    }

    $alumno1 = new Alumno('lopez');
    $alumno2 = new Alumno('lopez','javi');

    $vehiculo = new Terrestre('VW','Golf',4.0);

    echo $vehiculo->mostrar();

    $propiedad = new Propiedad();

    echo $propiedad->public;

    echo $propiedad->getPublica();
    //$propiedad->private; no tiene acceso desde su misma classe
    echo $propiedad->getPrivate();
    //$propiedad->protected; no tiene acceso desde su misma classe
    echo $propiedad->getProtected();

    $propiedadhija = new PropiedadHija();

    echo $propiedadhija->getProtected();
    //$propiedadhija->getPrivate(); solo desde su classe

    class Statico{

        static $edad;
        const piernas = 2;

        function edad(){
            return self::$edad;
        }

    }

    Statico :: $edad = 21;

    echo Statico :: $edad;

    $static = new Statico();

    echo $static->edad();

    echo Statico :: piernas;

    abstract class Producto{

        public $nombre = 'producto';

        abstract function calcularPrecio();
    
    }
    interface Precios{

        function descuento();

    }
    class Ordenador extends Producto implements Precios{

        public $PrecioDisco;

        function calcularPrecio(){

            return $this->PrecioDisco.' '.$this->nombre;

        }
        function descuento(){
            return $this->PrecioDisco-1;
        }

    }

    $ordenador = new Ordenador(300);

    echo $ordenador->calcularPrecio();

    trait precioIVA {

        public $iva = 0.21;

        public function precioESP(){
            return $this->precio * (1 + $this->iva);
        }
    }

    class Andorra extends España {
        use precioIVA;
        public $precio;

        function __construct(float $precio){
            $this->precio = $precio;
        }
        /*no se puede heredar al ser tipo final
        function corupccion(){

        }*/

        function __toString(){

        }
    }
    class España{
        final public function corupccion(){
            return 1000;
        }
    }
    $andorra = new Andorra(12.4);
    echo $andorra->precioESP();
    




    