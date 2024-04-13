<?php
include_once 'utilisateur.php';
class enseignant extends Utilisateur
{
    private $Id_enseignant;
    private $specialite;


    public function __construct($Id_utilisateu, $Nom, $Prenom, $Adresse ,$Tel, $Password, $Id_enseignant,$specialite)
    {
        parent::__construct($Id_utilisateu, $Nom, $Prenom, $Adresse ,$Tel, $Password);
        $this->Id_enseignant = $Id_enseignant;
        $this->specialite = $specialite;
    }
    public function getId_enseignant()
    {
        return $this->Id_enseignant;
    }
    public function getSpecialite()
    {
        return $this->specialite;
    }
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }
}
?>