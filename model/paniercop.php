<?php
class paniercop
{

    private ?string $produit;
    private ?string $price;
    private ?string $client;
    private ?int $i;
  

    public function __construct($f, $l, $e=null)
    {
        $this->produit = $f;
        $this->price= $l;
        $this->client = $e;

 
    
     
  
    }

    public function getproduit()
    {
        return $this->produit;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function getclient()
    {
        return $this->client;
    }
    
    public function setproduit($produit)
    {
        $this->produit = $produit;
    }

    public function setprice($price)
    {
        $this->price = $price;
    }

    public function setclient($client)
    {
        $this->client->$client;
    }
   
}
?>
