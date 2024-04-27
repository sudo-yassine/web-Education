<?php
include_once '../Model/eleve.php';
include_once '../config.php';
class eleveC 
{
    public function affichereleve($Id_eleve)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM utilisateur WHERE Role = :Id_eleve");
            $query->execute(['Id_eleve' => $Id_eleve]);
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
    public function afficherutilisateur()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM eleve");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
    public function listEleves()
    {
        $sql = "SELECT utilisateur.Id_utilisateur, utilisateur.Nom, utilisateur.Prenom, utilisateur.Adresse, utilisateur.Tel, utilisateur.Password, eleve.Id_eleve, eleve.niveau FROM utilisateur INNER JOIN eleve ON utilisateur.Id_utilisateur = eleve.Id_eleve";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    
    function deleteeleve($Id_eleve)
    {
        $sql = "DELETE FROM eleve WHERE Id_eleve = :Id_eleve";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id_eleve', $Id_eleve);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addeleve($eleve) {
        $db = config::getConnexion();
        $db->beginTransaction();  // Commencer une transaction
        try {
            // Ajout dans la table utilisateur
            $sql = "INSERT INTO utilisateur (Nom, Prenom,Adresse=:Adresse,Tel , Password, Role)
                    VALUES (:Nom, :Prenom, :Tel, :Password, 1)";
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $eleve->getNom(),
                'Prenom' => $eleve->getPrenom(),
                'Adresse' =>$eleve->getAdresse(),
                'Tel' => $eleve->getTel(),
                'Password' => $eleve->getPassword()
            ]);
            $userId = $db->lastInsertId(); // Récupérer l'ID de l'utilisateur ajouté
    
            // Ajout dans la table eleve avec l'ID utilisateur
            $sql = "INSERT INTO eleve (Id_eleve, niveau)  
                    VALUES (:Id_eleve, :niveau)";
            $query = $db->prepare($sql);
            $query->execute([
                'Id_eleve' => $userId,
                'niveau' => $eleve->getNiveau()
            ]);
            $db->commit();  // Valider la transaction
        } catch (Exception $e) {
            $db->rollBack();  // Annuler la transaction en cas d'erreur
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function geteleveById($id)
        {
        $sql = "SELECT * FROM eleve WHERE Id_eleve = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $eleve = $req->fetch(PDO::FETCH_ASSOC);
            return $eleve;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function updateeleve($eleve, $id) {
        $db = config::getConnexion();
        try {
            $db->beginTransaction();
            // Mise à jour de la table utilisateur
            $sql = "UPDATE utilisateur SET Nom = :Nom, Prenom = :Prenom, Adresse=:Adresse, Tel = :Tel, Password = :Password
                    WHERE Id_utilisateur = :id AND Role = 1";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'Nom' => $eleve->getNom(),
                'Prenom' => $eleve->getPrenom(),
                'Adresse' =>$eleve->getAdresse(),
                'Tel' => $eleve->getTel(),
                'Password' => $eleve->getPassword()
            ]);
    
            // Mise à jour de la table eleve
            $sql = "UPDATE eleve SET Niveau = :Niveau WHERE Id_eleve = :id";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'Niveau' => $eleve->getNiveau()
            ]);
            $db->commit();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $db->rollBack();
            echo 'Error: ' . $e->getMessage();
        }
    }
    /*
    function showuser($Id_eleve) {
        $sql = "SELECT * FROM eleve WHERE Id_eleve = :Id_eleve"; 
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['Id_eleve' => $Id_eleve]);
            $eleve = $query->fetch();
            return $eleve;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }*/
    function showuser($Id_eleve) {
        // Joindre la table `eleve` avec la table `utilisateur` pour obtenir des informations sur l'utilisateur associé à chaque élève
        $sql = "SELECT eleve.*, utilisateur.Nom, utilisateur.Prenom, utilisateur.Adresse,utilisateur.Tel,utilisateur.Password 
                FROM eleve 
                INNER JOIN utilisateur ON eleve.Id_eleve = utilisateur.Id_utilisateur 
                WHERE eleve.Id_eleve = :Id_eleve"; 
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['Id_eleve' => $Id_eleve]);
            $eleve = $query->fetch(PDO::FETCH_ASSOC);
            return $eleve;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    public function addEleveDetails($userId, $niveau) {
        $db = config::getConnexion();
        $sql = "INSERT INTO eleve (Id_eleve, niveau) VALUES (:Id_eleve, :niveau) ON DUPLICATE KEY UPDATE niveau = :niveau";
        $query = $db->prepare($sql);
        $query->execute(['Id_eleve' => $userId, 'niveau' => $niveau]);
    }
    
    
   
}
?>
