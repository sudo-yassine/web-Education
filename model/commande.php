<?php
class commande
{

    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?int $codep;
    private ?string $ville;
    private ?string $num;
    private ?int $id_C;

    public function __construct($f, $l, $e, $c, $v, $n, $id = null)
    {
        $this->firstname = $f;
        $this->lastname = $l;
        $this->email = $e;

        // Ensure $c is either an integer or null before assigning
        $this->codep =$c;

        $this->ville = $v;
        $this->num = $n;
        $this->id_C = $id;
    
     
  
    }

    public function getNomclient()
    {
        return $this->firstname;
    }
    public function getprenom()
    {
        return $this->lastname;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getcodep()
    {
        return $this->codep;
    }

    
    public function getville()
    {
        return $this->ville;
    }
    public function getnum()
    {
        return $this->num;
    }
    public function getid_C()
    {
        return $this->id_C;
    }

    public function setNomclient($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setprenom($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setemail($email)
    {
        $this->email = $email;
    }
    public function setcodep($codep)
    {
        $this->codep = $codep;
    }

    public function setville($ville)
    {
        $this->ville = $ville;
    }

    public function setnum($num)
    {
        $this->num = $num;
    }
   
}
?>
