<?php
class ressources
{
    private $id_ressources;
    private $description_ressources;
    private $livre;
    private $playlist_ytb;
    private $id_examen; // Nouvel attribut ajouté

    public function __construct($id_ressources = null, $description_ressources, $livre, $playlist_ytb, $id_examen = null)
    {
        $this->id_ressources = $id_ressources;
        $this->description_ressources = $description_ressources;
        $this->livre = $livre;
        $this->playlist_ytb = $playlist_ytb;
        $this->id_examen = $id_examen; // Initialiser le nouvel attribut
    }

    public function getid_ressources()
    {
        return $this->id_ressources;
    }
    public function getdescription_ressources()
    {
        return $this->description_ressources;
    }
    public function setdescription_ressources($description_ressources)
    {
        $this->description_ressources = $description_ressources;
    }
    public function getlivre()
    {
        return $this->livre;
    }
    public function setlivre($livre)
    {
        $this->livre = $livre;
    }
    public function getplaylist_ytb()
    {
        return $this->playlist_ytb;
    }
    public function setplaylist_ytb($playlist_ytb)
    {
        $this->playlist_ytb = $playlist_ytb;
    }
    public function getid_examen()
    {
        return $this->id_examen;
    }
    public function setid_examen($id_examen)
    {
        $this->id_examen = $id_examen;
    }
}
?>
