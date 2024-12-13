<?php 



class Conexion{


    static public function conectar(){

        $link = new PDO("mysql:host=localhost;port=3307;dbname=api-rest", "root", "13456789");


        $link->exec("set names utf8");


        return $link;


    }


}


?>