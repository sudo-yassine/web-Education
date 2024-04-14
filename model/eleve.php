<?php
include_once 'utilisateur.php';
class eleve extends Utilisateur
{
    private $Id_eleve;
    private $niveau;


    public function __construct($Id_utilisateu, $Nom, $Prenom, $Adresse ,$Tel, $Password, $Id_eleve,$niveau)
    {
        parent::__construct($Id_utilisateu, $Nom, $Prenom, $Adresse ,$Tel, $Password);
        $this->Id_eleve = $Id_eleve;
        $this->niveau = $niveau;
    }
    public function getId_eleve()
    {
        return $this->Id_eleve;
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