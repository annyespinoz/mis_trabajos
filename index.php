<?php
/**
 * Created by PhpStorm.
 * User: aespinoza-pc
 * Date: 27/1/2016
 * Time: 11:06
 */

include_once "conec.php";
include_once "ConexionPGSQL.php";


$conec = new conec();
$usuario="postgres";
$pass = "123456";
$host="localhost";
$bd="persona";
$miconect = $conec->conectar_PostgreSQL($usuario, $pass, $host, $bd);

//insertar persona
//$conec->insertarPersona($miconect,3,"Robert");
$conec->modificarPersona($miconect,3,"Robert x");
$conec->listarPersonas($miconect);
$persona=$conec->buscarPersona($miconect,1,"anny");

print_r("<br />");
print_r($persona);


//instanciación de la clase conexión a postgresql.
/*
$conexion = new ConexionPGSQL();
$conexion->conectar();
if($conexion->conectar()==true){
    echo "conexion exitosa";
}else {
    echo "no se pudo conectar";
}*/

