<?php
class admin
{
    private $Id_admin;
    private $niveau;
    private $nom;
    private $prenom;
    private $pass;
    private $Email;

    public function __construct($Id_admin = null, $niveau, $nom, $prenom, $pass, $Email)
    {
        $this->Id_admin = $Id_admin;
        $this->niveau = $niveau;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setpassword($pass);  // Utilisation du setter pour hasher le mot de passe dès la création
        $this->Email = $Email;
    }

    public function getId()
    {
        return $this->Id_admin;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }  

    public function getPassword()
    {
        return $this->pass;
    } 

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function setpassword($pass)
    {
        $this->pass = password_hash($pass, PASSWORD_DEFAULT); // Hashage du mot de passe
    }
}
?>
