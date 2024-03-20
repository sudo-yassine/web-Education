<?php
class cours
{
    /*
    CREATE TABLE recrut(
        id_recrutement int,
        date_entretien DATE,
        statu int,
        cv varchar(255),
        nb_question int,
        reponse varchar(255),
        FOREIGN KEY(id_enseignant) REFERENCES enseignant(id_enseignant)      
      
      );
    */
    private $id_recrutement;
    private $date_entretien;
    private $statu;
    private $cv;
    private $nb_question;
    private $reponse;



    public function __construct($id = null, $date_entretien , $statu, $cv ,$nb_question,$reponse)
    {
        $this->id_recrutement = $id;
        $this->date_entretien = $date_entretien;
        $this->statu = $statu;
        $this->cv = $cv;
        $this->nb_question = $nb_question;
        $this->reponse = $reponse;

    }

    public function getid_recrutement()
    {
        return $this->id_recrutement;
    }
    public function getdate_entretien()
    {
        return $this->date_entretien;
    }
    public function setdate_entretien($date_entretien)
    {
        $this->date_entretien = $date_entretien;
    }
    public function getstatu()
    {
        return $this->statu;
    }
    public function setstatu($statu)
    {
        $this->statu = $statu;
    }
    public function getcv()
    {
        return $this->cv;
    }
    public function setcv($cv)
    {
        $this->cv = $cv;
    }
    public function getnb_question()
    {
        return $this->nb_question;
    }
    public function setnb_question($nb_question)
    {
        $this->nb_question = $nb_question;
    }    
    public function reponse()
    {
        return $this->reponse;
    }
    public function setreponse($reponse)
    {
        $this->reponse = $reponse;
    }













}

?>