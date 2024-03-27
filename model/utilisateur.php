<?php
class Utilisateur
{
    private $Id_utilisateur;
    private $Nom;
    private $Prenom;
    private $Adresse;
    private $Tel;
    private $Password;


    public function __construct ($Id_utilisateu, $Nom, $Prenom, $Adresse ,$Tel, $Password)
    {
        $this->Id_utilisateu = $Id_utilisateu;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->Tel = $Tel;
        $this->Password = $Password;
    }

    public function getId()
    {
        return $this->Id_utilisateu;
    }
    public function getNom()
    {
        return $this->Nom;
    }
    public function getPrenom()
    {
        return $this->Prenom;
    }
    public function getAdresse()
    {
        return $this->Adresse;
    }
    public function getTel()
    {
        return $this->Tel;
    }    
    public function getPassword()
    {
        return $this->Password;
    } 
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
    }
    public function setTel($Tel)
    {
        $this->Tel= $Tel;
    }
    public function setPassword($Password)
    {
        $this->Password= $Password;
    }
}
?>