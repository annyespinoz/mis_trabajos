<?php

/**
 * Created by PhpStorm.
 * User: aespinoza-pc
 * Date: 27/1/2016
 * Time: 11:44
 */
class ConexionPGSQL{

//declaraci�n de variables

    public $host; // para conectarnos a localhost o el ip del servidor de postgres

    public $db; // seleccionar la base de datos que vamos a utilizar

    public $user; // seleccionar el usuario con el que nos vamos a conectar

    public $pass; // la clave del usuario

    public $conexion;  //donde se guardara la conexi�n

    public $url; //direcci�n de la conexi�n que se usara para destruirla mas adelante

//creaci�n del constructor

    function __construct(){

    }

//creaci�n de la funci�n para cargar los valores de la conexi�n.

    public function cargarValores(){

        $this->host='localhost';

        $this->db='persona';

        $this->user='postgres';

        $this->pass='123456';

        $this->conexion="host='$this->host' dbname='$this->db' user='$this->user' password='$this->pass'";

}

//funci�n que se utilizara al momento de hacer la instancia de la clase

    function conectar(){

        $this->cargarValores();
echo $this->conexion;
        $this->url = pg_connect($this->conexion);

        return true;

    }

//funci�n para destruir la conexi�n.

    function destruir(){

        pg_close($this->url);

    }

}
