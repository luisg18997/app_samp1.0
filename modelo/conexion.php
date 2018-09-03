<?php
 class conexion{
     //funcion para realizar conexion a la base de datos
    static function conectar(){
        try{
          $conect= new PDO('pgsql:host=localhost;dbname=movi_per', 'postgres','luis18997');
          $conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (exception $e){
            die($e->getmessage());
        }
        return $conect;
    }
 }

 ?>