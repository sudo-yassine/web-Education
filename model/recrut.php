<?php
class recrut
{
   private $id_recrutement;
   private $date_entretien;
   private $statu;
   private $cv;
   private $nb_question;
   private $reponse;
   private $id_enseignant;
   

   public function __construct($id_recrutement=null, $date_entretien, $statu=null,$cv,$nb_question=null, $reponse, $id_enseignant=null)
   {
    $this->id_recrutement = $id_recrutement;
    $this->date_entretien = $date_entretien;
    $this->statu = $statu;
    $this->cv = $cv;
    $this->nb_question = $nb_question;
    $this->reponse = $reponse;
    $this->id_enseignant = $id_enseignant;
   }

   public function getid_recrutement() 
   {
    return $this->id_recrutement;
   }
   public function getdate_entretien()
   {
    return $this->date_entretien;
   }
   public function getstatu()
   {
    return $this->statu;
   }
   public function getnb_question()
   {
    return $this->nb_question;
   }
   public function getreponse()
   {
    return $this->reponse;
   }
   public function setdate_entretien($date_entretien)
   {
    $this->date_entretien = $date_entretien;
   }
   public function setstatu($statu)
   {
    $this->statu = $statu;
   }
   public function setnb_question($nb_question)
   {
    $this->nb_question = $nb_question;
   }
   public function setreponse($reponse)
   {
    $this->reponse =$reponse;
   }
   public function setid_enseignant($id_enseignant)
   {
    $this->id_enseignant = $id_enseignant;
   }
   public function getid_enseignant()
   {
    return $this->id_enseignant;
   }
   public function getcv()
   {
    return $this->cv;
   }
   public function setcv($cv)
   {
    $this->cv = $cv;
   }
}

?>