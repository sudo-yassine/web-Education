<?php
class rating
{
   private $id_rating;
   private $star;
   private $comment;
   
   

   public function __construct($id_rating=null, $star, $comment)
   { 
    $this->id_rating = $id_rating;
    $this->star= $star;
    $this->comment = $comment;
   }
   public function getid_rating() 
   {
    return $this->id_rating;
   }

   public function getstar()
   {
    return $this->star;
   }
   public function getcomment()
   {
    return $this->comment;
   }
   public function setstar($star)
   {
    $this->star = $star;
   }
   public function setcomment($comment)
   {
    $this->comment = $comment;
   }
}

?>