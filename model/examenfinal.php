<?php
include_once 'examen.php';
class examenfinal extends examen
{
    private $id_examenfinal;
    private $difficulte;


    public function __construct($id_examen, $id_cours, $titre, $description ,$duree, $id_examenfinal,$difficulte)
    {
        parent::__construct($id_examen, $id_cours, $titre, $description ,$duree);
        $this->id_examenfinal = $id_examenfinal;
        $this->difficulte = $difficulte;
    }
    public function getid_examenfinal()
    {
        return $this->id_examenfinal;
    }
    public function getdifficulte()
    {
        return $this->difficulte;
    }
    public function setid_examenfinal($id)
    {
        $this->getid_examenfinal= $id;
    }
    public function setdifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }
}
?>