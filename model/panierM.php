<?php
class panier
{ 
    private $id;
    private $produit;
    private $price;
    private $id_C;

    public function __construct($i=null,$pt, $p,$io)
    {
        $this->id=$i;
        $this->produit = $pt;
        $this->price = $p;
        $this->id_C=$io;
    
    }
    
    public function getproduit()
    {
        return $this->produit;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getid_c()
    {
        return $this->id_C;
    }

   
    
    public function setproduit($produit)
    {
        $this->produit = $produit;
    }
    public function setprice($price)
    {
        $this->price = $price;
    }
   
    public function setid_C($id_C)
    {
        $this->id_C=$id_C;
    }

   
}
?>
