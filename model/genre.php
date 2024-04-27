<?php
class Genre
{
    private $idGenre;
    private $nom;
    public function __construct($idGenre, $nom)
    {
        $this->idGenre = $idGenre;
        $this->nom = $nom;
    }
}
?>