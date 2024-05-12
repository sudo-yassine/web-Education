<?php
class reclamation
{
   private $id_reclamation;
   private $nom;
   private $prenom;
   private $email;
   private $telephone;
   private $typee;
   private $descp;
   

   public function __construct($id_reclamation=null, $nom, $prenom, $email, $telephone, $typee, $descp)
   { 
    $this->id_reclamation = $id_reclamation;
    $this->nom= $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->telephone = $telephone;
    $this->typee = $typee;
    $this->descp = $descp;
   }
   public function getid_reclamation() 
   {
    return $this->id_reclamation;
   }

   public function getnom()
   {
    return $this->nom;
   }
   public function getprenom()
   {
    return $this->prenom;
   }
   public function gettelephone()
   {
    return $this->telephone;
   }
   public function gettypee()
   {
    return $this->typee;
   }
   public function setnom($nom)
   {
    $this->nom = $nom;
   }
   public function setprenom($prenom)
   {
    $this->prenom = $prenom;
   }
   public function settelephone($telephone)
   {
    $this->telephone = $telephone;
   }
   public function settypee($typee)
   {
    $this->typee = $typee;
   }
   public function setdescp($descp)
   {
    $this->descp = $descp;
   }
   public function getdescp()
   {
    return $this->descp;
   }
   public function getemail()
   {
    return $this->email;
   }
   public function setemail($email)
   {
    $this->email = $email;
   }
}

?>