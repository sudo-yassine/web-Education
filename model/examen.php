<?php
class examen
{
    private $id_examen;
    private $id_ressources;
    private $titre;
    private $description;
    private $duree;
    public function __construct($id_examen = null, $id_ressources , $titre, $description ,$duree)
    {
        $this->id_examen = $id_examen;
        $this->id_ressources = $id_ressources;
        $this->titre = $titre;
        $this->description = $description;
        $this->duree = $duree;
    }

    public function getid_examen()
    {
        return $this->id_examen;
    }
    public function getid_ressources()
    {
        return $this->id_ressources;
    }
    public function setid_ressources($id_ressources)
    {
        $this->id_ressources = $id_ressources;
    }
    public function gettitre()
    {
        return $this->titre;
    }
    public function settitre($titre)
    {
        $this->titre = $titre;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function getduree()
    {
        return $this->duree;
    }
    public function setduree($duree)
    {
        $this->duree = $duree;
    }
}
?>