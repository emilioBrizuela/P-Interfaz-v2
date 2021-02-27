<?php
    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('BD', '2si2020');

    class DAO{
        private $conexion;

        public function __construct(){
            $this->conexion=new mysqli(HOST, USER, PASS,  BD);
        }

        public function consultar($SQL){
            $res=$this->conexion->query($SQL);
            $filas=array();
            while($reg=$res->fetch_assoc()){
                $filas[]=$reg;
            }
            return $filas;
        }

        public function actualizar($SQL){
            $res=$this->conexion->query($SQL);
            if($this->conexion->errno){
                die('Error al actualizar');
            }else{
                return $this->conexion->affected_rows;
            }
        }

        public function insertar($SQL){
            $res=$this->conexion->query($SQL);
            return $this->conexion->insert_id;
        }

        public function borrar($SQL){
            $res=$this->conexion->query($SQL);
            return $this->conexion->affected_rows;
        }

    }

?>