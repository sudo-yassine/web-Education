<?php

require_once "C:xampp/htdocs/projets/config.php";
class panierC {
    public function listpanier()
    {
        $sql = "SELECT * FROM panier";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addpanier($panier)
    {
        $sql = "INSERT INTO panier (produit,price,id_C) 
                VALUES (:produit,:price,:id_C)";
              
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
              
               'produit' => $panier->getProduit(),
                'price' => $panier->getPrice(),
                'id_C'=>$panier->getid_C(),
              
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public function addpaniercop($panier)
    {
        $sql = "INSERT INTO paniercop (produit,price,client) 
                VALUES (:produit,:price,:client)";
              
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
              
               'produit' => $panier->getProduit(),
                'price' => $panier->getPrice(),
                'client'=>$panier->getclient(),
              
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function deletepanier($id)
    {
        $sql = "DELETE FROM panier WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function deletepaniercop($id)
    {
        $sql = "DELETE FROM paniercop WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function countprice($id_C)
{
    $sql = "SELECT SUM(price) as count FROM panier WHERE id_C = :id_C";
    $db = config::getConnexion();
    
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_C', $id_C, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

        return $count;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    } 
}
public function countpriceco()
{
    $sql = "SELECT SUM(price) as count FROM paniercop WHERE client is null ";
    $db = config::getConnexion();
    
    try {
        $stmt = $db->prepare($sql);
      
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

        return $count;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    } 
}
public function listpanierc()
{
    $sql = "SELECT * FROM paniercop WHERE client IS NULL";
    $db = config::getConnexion();
    
    try {
        $stmt = $db->prepare($sql);

        $stmt->execute();
        
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function reset()
{
    try {
        $db = config::getConnexion();
        
        $query = $db->prepare('UPDATE paniercop SET client = 1 WHERE client IS NULL');
        $query->execute();

      //  echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Display the error message in case of failure
    }
}
public function showpanier($id_C)
{
    try {
        $sql = "SELECT * FROM panier WHERE id_C = :id_C";
        $db = config::getConnexion();

        $query = $db->prepare($sql);
        $query->execute(['id_C' => $id_C]);

        // Use fetchAll to get all rows from the result set
        return $query->fetchAll();
    } catch (PDOException $e) {
        // Handle any exceptions that occur during the execution of the query
        echo 'Error: ' . $e->getMessage();
    }
}

}
    





?>
