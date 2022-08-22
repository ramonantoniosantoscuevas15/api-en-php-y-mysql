<?php
include 'pelicula.php';

class ApiPeliculas
{
    function obtenertodo()
    {
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerpeliculas();
        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    "id" => $row['id'],
                    "nombre" => $row['nombre'],
                    "categoria" => $row['categoria'],
                    "duracion" => $row['duracion'],
                );
                array_push($peliculas['items'], $item);
            }
            echo json_encode($peliculas);
        } else {
            echo json_encode(array('Mesaje' => 'No Hay Elementos Registrados'));
        }
    }
}


