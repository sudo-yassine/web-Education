<?php
class examen
{
    private $id_examen;
    private $titre;
    private $description;
    private $duree;
    private $difficulte;

    public function __construct($id_examen = null, $titre, $description, $duree, $difficulte)
    {
        $this->id_examen = $id_examen;
        $this->titre = $titre;
        $this->description = $description;
        $this->duree = $duree;
        $this->difficulte = $difficulte;
    }

    public function getid_examen()
    {
        return $this->id_examen;
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

    public function getdifficulte()
    {
        return $this->difficulte;
    }

    public function setdifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }
}
?>
