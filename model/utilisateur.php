<?php
class Utilisateur
{
    protected $Id_utilisateur;
    protected $Nom;
    protected $Prenom;
    protected $Adresse;
    protected $Tel;
    protected $Password;
    protected $Role;

    public function __construct($Id_utilisateur, $Nom, $Prenom, $Adresse, $Tel, $Password, $Role)
    {
        $this->Id_utilisateur = $Id_utilisateur;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->Tel = $Tel;
        $this->Password = $Password;
        $this->Role = $Role;
    }
    public function getId()
    {
        return $this->Id_utilisateur;
    }
    public function getNom()
    {
        return $this->Nom;
    }
    public function getRole()
    {
        return $this->Role;
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