<?php

/**
 * Created by PhpStorm.
 * User: aespinoza-pc
 * Date: 27/1/2016
 * Time: 11:05
 */
class conec
{
    function conectar_PostgreSQL( $usuario, $pass, $host, $bd )
    {
        $conexion = pg_connect( "user=".$usuario." ".
            "password=".$pass." ".
            "host=".$host." ".
            "dbname=".$bd
        ) or die( "Error al conectar: ".pg_last_error() );

        return $conexion;
    }

    function conectar(){
        print("antes de conec");
        $cadena_conexion = "host=localhost dbname=persona user=postgres password=123456";

        if(($conexion = pg_connect($cadena_conexion)) == false){
            return false;
            echo "No funciona;";
        }else{ // ESTE ELSE LO AGREGUE YO
            echo "paso por aqu&iacute;";
            return true;
        }
    }

    function borrarPersona( $conexion, $id )
    {
        $sql = "DELETE FROM tbl_personas";
        // Si 'id' es diferente de 'null' sólo se borra la persona con el 'id' especificado:
        if( $id != null )
            $sql .= " WHERE id=".$id;
        // Ejecutamos la consulta (se devolverá true o false):
        return pg_query( $conexion, $sql );
    }

    function insertarPersona( $conexion, $id, $nombre )
    {
        $sql = "INSERT INTO tbl_personas VALUES (".$id.", '".$nombre."')";
        // Ejecutamos la consulta (se devolverá true o false):
        return pg_query( $conexion, $sql );
    }

    function modificarPersona( $conexion, $id, $nombre )
    {
        $sql = "UPDATE tbl_personas SET nombre='".$nombre."' WHERE id=".$id;
        // Ejecutamos la consulta (se devolverá true o false):
        return pg_query( $conexion, $sql );
    }
    function listarPersonas( $conexion )
    {
        $sql = "SELECT * FROM tbl_personas ORDER BY id";
        $ok = true;
        // Ejecutar la consulta:
        $rs = pg_query( $conexion, $sql );
        if( $rs )
        {
            // Obtener el número de filas:
            if( pg_num_rows($rs) > 0 )
            {
                echo "<p/>LISTADO DE PERSONAS<br/>";
                echo "===================<p />";
                // Recorrer el resource y mostrar los datos:
                while( $obj = pg_fetch_object($rs) )
                    echo $obj->id." - ".$obj->nombre."<br />";
            }
            else
                echo "<p>No se encontraron personas</p>";
        }
        else
            $ok = false;
        return $ok;
    }
    function buscarPersona( $conexion, $id )
    {
        $sql = "SELECT * FROM tbl_personas WHERE id=".$id."";
        $devolver = null;
        // Ejecutar la consulta:
        $rs = pg_query( $conexion, $sql );
        if( $rs )
        {
            // Si se encontró el registro, se obtiene un objeto en PHP con los datos de los campos:
            if( pg_num_rows($rs) > 0 )
                $devolver = pg_fetch_object( $rs, 0 );
        }
        return $devolver;
    }

}