<?php
class achat
{
    private ?int $id_achat = null;
    private ?string $nb_cours = null;
    private ?string $prix = null;

    public function __construct($id, $t,$d)
    {
        $this->id_achat = $id;
        $this->nb_cours = $t;
        $this->prix = $d;

    }


    public function getIdachat()
    {
        return $this->id_achat;
    }


    public function getnb_cours()
    {
        return $this->nb_cours;
    }


    public function setnb_cours($t)
    {
        $this->nb_cours = $t;

        return $this;
    }


    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($d)
    {
        $this->prix = $d;

        return $this;
    }
   

}
