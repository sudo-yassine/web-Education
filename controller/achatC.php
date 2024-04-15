<?php

require '../config.php';

class achatC
{

    public function list_achat()
    {$db = config::getConnexion();
        $sql = "SELECT * FROM achat";
        
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete_achat($ide)
    {
        $sql = "DELETE FROM achat WHERE id_achat = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function show_achat($id)
    {
        $sql = "SELECT * from achat where id_achat = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $achat = $query->fetch();
            return $achat;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function add_achat($achat)
    {
        $sql = "INSERT INTO `achat`
        VALUES (NULL, :nb_cours,:prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nb_cours' => $achat->getnb_cours(),
                'prix' => $achat->getprix(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function update_achat($achat, $id_achat)
    {   $sql = "UPDATE achat SET nb_cours = :nb_cours, prix = :prix WHERE id_achat = :id_achat";
        $db = config::getConnexion();
        try {

            $query = $db->prepare($sql);
            
            $query->execute([
                'id_achat' => $id_achat,
                'nb_cours' => $achat->getnb_cours(),
                'prix' => $achat->getprix()
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
