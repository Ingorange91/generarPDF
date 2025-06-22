<?php

    class usuario{
        private $conexion;

        public function __construct()
        {
            $objConecion=new connection();
            $this->conexion=$objConecion->get_Conexion();
        }

        public function consultarUsuarios(){
            $stmt=$this->conexion->prepare("SELECT * FROM usuario");
            $stmt->execute();
            $usuarios=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }
    }



?>