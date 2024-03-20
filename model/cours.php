<?php
class cours
{
    private $id_cours;
    private $nom_cours;
    private $heures;
    private $niveau;
    private $contenu;


    public function __construct($id = null, $nom_cours , $heures, $niveau ,$contenu)
    {
        $this->id_cours = $id;
        $this->nom_cours = $nom_cours;
        $this->heures = $heures;
        $this->niveau = $niveau;
        $this->contenu = $contenu;
    }

    public function getid_cours()
    {
        return $this->id_cours;
    }
    public function getnom_cours()
    {
        return $this->nom_cours;
    }
    public function setnom_cours($nom_cours)
    {
        $this->nom_cours = $nom_cours;
    }
    public function getheures()
    {
        return $this->heures;
    }
    public function setheures($heures)
    {
        $this->heures = $heures;
    }
    public function getniveau()
    {
        return $this->niveau;
    }
    public function setniveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function getcontenu()
    {
        return $this->contenu;
    }
    public function setcontenu($contenu)
    {
        $this->contenu = $contenu;
    }












}

?>