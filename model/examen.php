<?php
class examen
{
    private $id_examen;
    private $id_cours;
    private $titre;
    private $description;
    private $date_limite;
    public function __construct($id = null, $id_cours , $titre, $description ,$date_limite)
    {
        $this->id_examen = $id;
        $this->id_cours = $id_cours;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_limite = $date_limite;
    }

    public function getid_examen()
    {
        return $this->id_examen;
    }
    public function getid_cours()
    {
        return $this->id_cours;
    }
    public function setid_cours($id_cours)
    {
        $this->id_cours = $id_cours;
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

    public function getdate_limite()
    {
        return $this->date_limite;
    }
    public function setdate_limite($date_limite)
    {
        $this->date_limite = $date_limite;
    }
}
?>