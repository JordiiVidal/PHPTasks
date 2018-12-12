<?php
    class Test{
        private $conn;
        function __construct() {
            $server = "localhost";
            $user = "root";
            $password = "";
            $db = "examen";

            try {
                $this->conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        function borrarAlumno($nombre){
            try {
                
                $st = $this->conn->prepare("delete from Alumno where nombre=:nombre");
                $st->execute([':nombre'=>$nombre]);
                
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }
        }
        function numAlumnos(){
            try {
                
                    $st = $this->conn->prepare("select * from Alumno");
                    $st->execute();
                    return $st->rowCount();
                
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }
        }
        function nuevoAlumno($nombre){
            try {
                
                    $st = $this->conn->prepare("INSERT INTO Alumno (nombre) VALUES (?)");
                    $st->execute(array($nombre));
                    
            } catch (Exception $ex) {
                
                throw new Exception($ex->getMessage());
                
            }
        }
    }
    
    $test = new Test();
    $test->borrarAlumno('juan');
    echo $test->numAlumnos();
    $test->nuevoAlumno('luis');

