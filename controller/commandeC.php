<?php

require_once "C:xampp/htdocs/projets/config.php";
require_once "C:xampp/htdocs/projets/models/panierM.php";
class commandeC
{
    public function afficherDerniereCommande()
{
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * FROM commande ORDER BY id_C DESC LIMIT 1");
        $query->execute();
        
        // Fetch all rows
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        // Return the last row if it exists
        if (!empty($rows)) {
            return end($rows);
        } else {
            return null; // or handle the case where there are no rows
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
 public function affichercommande($id_p)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM commande WHERE PANIER = :id");
            $query->execute(['id' => $id]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    public function afficherpanier()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM PANIER");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function countCommande()
    {
        $sql = "SELECT COUNT(*) as count FROM commande";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            $count = $result->fetch(PDO::FETCH_ASSOC)['count'];
            return $count;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        } 
    }
    
   
    public function listcommande()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function croicommande()
{
    $sql = "SELECT * FROM commande ORDER BY firstname ASC";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    } 
}
    public function addCommande($commande)
{
    $sql = "INSERT INTO commande (firstname, lastname, email, codep, ville, num, id_C) 
            VALUES (:firstname, :lastname, :email, :codep, :ville, :num, NULL)";
    
    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'firstname' => $commande->getNomclient(),
            'lastname' => $commande->getprenom(),
            'email' => $commande->getemail(),
            'codep' => $commande-> getcodep(),
            'ville' => $commande->getville(),
            'num' => $commande->getnum(),
        ]);
    } catch (Exception $e) {
       
        echo 'Error adding commande: ' . $e->getMessage();
        
    }
}


    public function deletecommande($id)
    {
        $sql = "DELETE FROM commande WHERE id_C = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function showcommande($id)
    {
        $sql = "SELECT * from commande where id_C = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
           
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updatecommande($commande, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    firstname = :firstname, 
                    lastname = :lastname, 
                    email= :email, 
                    codep = :codep,
                    ville=:ville,
                    num= :num
                    WHERE id_C=:id_C'
            );
    
            $query->execute([
                'id_C' => $id,
                'firstname' => $commande->getNomclient(),
                'lastname' => $commande->getprenom(),
                'email' => $commande->getemail(),
                'codep' => $commande->getcodep(),
                'ville' => $commande->getville(),
                'num' => $commande->getnum(),
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Affichez le message d'erreur en cas d'échec
        }
    }
} 
