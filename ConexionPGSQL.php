<?php

/**
 * Created by PhpStorm.
 * User: aespinoza-pc
 * Date: 27/1/2016
 * Time: 11:44
 */
class ConexionPGSQL
{
    public $host; // para conectarnos a localhost o el ip del servidor de postgres

    public $db; // seleccionar la base de datos que vamos a utilizar

    public $user; // seleccionar el usuario con el que nos vamos a conectar

    public $pass; // la clave del usuario

    public $conexion;  //donde se guardara la conexión

    public $url; //dirección de la conexión que se usara para destruirla mas adelante

    //creación del constructor

    function __construct(){

    }

    public function cargarValores(){

        $this->host='localhost';

        $this->db='usuario';

        $this->user='postgres';

        $this->pass='123456';

        $this->conexion="host=$this->host dbname=$this->db user=$this->user password=$this->pass";

        }
    //función que se utilizara al momento de hacer la instancia de la clase

    function conectar(){

        $this->cargarValores();

        $this->url = pg_connect($this->conexion);

        return true;

    }
    function destruir(){

        pg_close($this->url);

    }


    function insertarPersona( $conexion, $id, $nombre )
    {
        $sql = "INSERT INTO tbl_personas VALUES (".$id.", '".$nombre."')";
        // Ejecutamos la consulta (se devolverá true o false):
        return pg_query( $conexion, $sql );
    }
}