<?php
class enseignant
{
    private $Id_enseignant;
    private $specialite;
    
    public function __construct($Id_enseignant, $specialite)
    {
     $this->Id_enseignant = $Id_enseignant;
     $this->specialite = $specialite;
    }
    public function getId_enseignant() 
    {
     return $this->Id_enseignant;
    }
    public function getspecialite()
    {
     return $this->specialite;
    }
    public function setId_enseignant($Id_enseignant)
    {
     $this->Id_enseignant = $Id_enseignant;
    }
    public function setspecialite($specialite)
   {
    $this->specialite = $specialite;
   }
    
}
?>