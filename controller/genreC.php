<?php
include '../model/genre.php';
include '../config.php';


class genreC
{
    public function afficherAlbums($idGenre)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM album WHERE genre = :id");
            $query->execute(['id' => $idGenre]);
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }


    public function afficherGenres()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM genre");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
}


?>