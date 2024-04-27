<?php
class admin
{
    private $Id_admin;
    private $niveau;
    private $nom;
    private $prenom;
    private $pass;
    private $Email;


    public function __construct ($Id_admin,$niveau , $nom, $prenom, $pass,$Email)
    {
        $this->Id_admin = $Id_admin;
        $this->niveau = $niveau;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pass = $pass;
        $this->Email =$Email;
    }

    public function getId()
    {
        return $this->$Id_admin;
    }
    public function getnom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function getniveau()
    {
        return $this->niveau;
    }  
    public function getpassword()
    {
        return $this->pass;
    } 
    public function setnom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setniveau($niveau)
    {
        $this->niveau = $niveau;
    }
    public function setpassword($pass)
    {
        $this->pass= $pass;
    }
}
?>