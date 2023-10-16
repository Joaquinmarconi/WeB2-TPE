<?php

class AlbumModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=pagina_musica;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getAlbums()
    {
        $query = $this->db->prepare('SELECT * FROM album');
        $query->execute();

        // $Albums es un arreglo de tareas
        $Albums = $query->fetchAll(PDO::FETCH_OBJ);

        return $Albums;
    }

    function getAlbumById($id)
{
    $query = $this->db->prepare('SELECT * FROM album WHERE Album_ID = ?');
    $query->execute([$id]);

    // $album es un objeto que representa el álbum
    $album = $query->fetch(PDO::FETCH_OBJ);

    return $album;
}


    /**
     * Inserta la tarea en la base de datos
     */
    function insertAlbum($nombre_album, $año, $banda_id)
    {
        $query = $this->db->prepare('INSERT INTO album (Nombre_Album, Año, Banda_ID) VALUES(?,?,?)');
        $query->execute([$nombre_album, $año, $banda_id]);

        return $this->db->lastInsertId();
    }



    function deleteAlbum($id)
    {
        $query = $this->db->prepare('DELETE FROM album WHERE id = ?');
        $query->execute([$id]);
    }
}