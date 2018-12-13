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

    /**PDO */

    class Test{
        private $conn;

        function __construct(){

            $server = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'pdo';

            try {
                $this->conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }
        function borrarAlumno($nombre,$apellido){

            try {
                
                $st = $this->conn->prepare("delete from Alumno where nombre=:nombre and apellido=:apellido");
                $st->execute([':nombre'=>$nombre,':apellido'=>$apellido]);
                
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }

        }
        function insertarAlumno($nombre,$apellido){

            try {
                
                $st = $this->conn->prepare("INSERT INTO Alumno (nombre,apellido) VALUES (?,?)");
                $st->execute(array($nombre,$apellido));
                
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }

        }
        function editarAlumno($id,$nombre){

            try {
                
                $st = $this->conn->prepare("UPDATE Alumno SET nombre = ? WHERE id = ?");
                $st->execute(array($nombre,$id));
                
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }
        }
        function selectByName($nombre){

            try {
                
                $st = $this->conn->prepare("SELECT * FROM Alumno WHERE nombre = ?");
                $st->execute(array($nombre));
                return $st->fetchAll(PDO::FETCH_OBJ);
            
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }
        }
        function selectByNameA($nombre){

            try {
                
                $st = $this->conn->prepare("SELECT * FROM Alumno WHERE nombre = ?");
                $st->execute(array($nombre));
                return $st->fetchAll(PDO::FETCH_ASSOC);
            
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }
        }
        
    }
    $pdo = new Test();
    $pdo->borrarAlumno('pedro','lopez');
    $pdo->insertarAlumno('pedro','lopez');
    $pdo->insertarAlumno('pedro','lopez');
    $pdo->editarAlumno(2,'pedrosa');
    $alumnos_result = $pdo->selectByName('pedro');
    //object
    foreach ($alumnos_result as $alumno) {

            echo $alumno->nombre;

    }
    $alumnos_resultA = $pdo->selectByNameA('pedro');
    //value
    foreach ($alumnos_resultA as  $value) {

        echo $value['nombre'];

    }
    




    