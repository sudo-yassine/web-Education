<?php
class matiere
{
    private $id_matiere;
    private $nom_matiere;
    private $description;
    private $resources;

    public function __construct($id = null, $nom_matiere, $description, $resources)
    {
        $this->id_matiere = $id;
        $this->nom_matiere = $nom_matiere;
        $this->description = $description;
        $this->resources = $resources;
    }

    public function getIdMatiere()
    {
        return $this->id_matiere;
    }

    public function getNomMatiere()
    {
        return $this->nom_matiere;
    }

    public function setNomMatiere($nom_matiere)
    {
        $this->nom_matiere = $nom_matiere;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;
    }
}
?>
