<?php
class Album
{
    private $idAlbum;
    private $titre;
    private $prix;  
    private $image;
    private $genre;

    public function __construct($idAlbum, $titre, $prix, $image, $genre)
    {
        $this->idAlbum= $idAlbum;
        $this->titre= $titre;
        $this->prix= $prix;
        $this->image= $image;
        $this->genre= $genre;
    }
}
?>