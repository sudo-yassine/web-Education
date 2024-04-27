<?php
class examen
{
    private $id_ressources;
    private $description_ressources;
    private $livre;
    private $playlist_ytb;
    public function __construct($id_ressources = null, $description_ressources , $livre, $playlist_ytb )
    {
        $this->id_ressources = $id_ressources;
        $this->description_ressources = $description_ressources;
        $this->livre = $livre;
        $this->playlist_ytb = $playlist_ytb;
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

}
?>