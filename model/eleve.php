<?php
include_once 'utilisateur.php';
class Eleve extends Utilisateur
{
    private $niveau;

    public function __construct($Id_utilisateur, $Nom, $Prenom, $Adresse, $Tel, $Password, $Role, $niveau)
    {
        parent::__construct($Id_utilisateur, $Nom, $Prenom, $Adresse, $Tel, $Password, $Role);
        $this->niveau = $niveau;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }
}
?>