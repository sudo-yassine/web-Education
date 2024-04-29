<?php
include_once '../Model/enseignant.php';
include_once '../config.php';
class enseignantC 
{
    public function afficherenseignant($Id_enseignant)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM utilisateur WHERE Role = :Id_enseignant");
            $query->execute(['Id_enseignant' => $Id_enseignant]);
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
    public function afficherutilisateur()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM enseignant");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
    public function listenseignants()
    {
        $sql = "SELECT utilisateur.Id_utilisateur, utilisateur.Nom, utilisateur.Prenom, utilisateur.Email, utilisateur.Tel, utilisateur.Password, enseignant.Id_enseignant, enseignant.specialite FROM utilisateur INNER JOIN enseignant ON utilisateur.Id_utilisateur = enseignant.Id_enseignant";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    
    function deleteenseignant($Id_enseignant)
    {
        $sql = "DELETE FROM enseignant WHERE Id_enseignant = :Id_enseignant";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id_enseignant', $Id_enseignant);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addenseignant($enseignant) {
        $db = config::getConnexion();
        $db->beginTransaction();  // Commencer une transaction
        try {
            // Ajout dans la table utilisateur
            $sql = "INSERT INTO utilisateur (Nom, Prenom,Email=:Email,Tel , Password, Role)
                    VALUES (:Nom, :Prenom, :Tel, :Password, 0)";
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $enseignant->getNom(),
                'Prenom' => $enseignant->getPrenom(),
                'Email' =>$enseignant->getEmail(),
                'Tel' => $enseignant->getTel(),
                'Password' => $enseignant->getPassword()
            ]);
            $userId = $db->lastInsertId(); // Récupérer l'ID de l'utilisateur ajouté
    
            // Ajout dans la table enseignant avec l'ID utilisateur
            $sql = "INSERT INTO enseignant (Id_enseignant, specialite)  
                    VALUES (:Id_enseignant, :specialite)";
            $query = $db->prepare($sql);
            $query->execute([
                'Id_enseignant' => $userId,
                'specialite' => $enseignant->getSpecialite()
            ]);
            $db->commit();  // Valider la transaction
        } catch (Exception $e) {
            $db->rollBack();  // Annuler la transaction en cas d'erreur
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function getenseignantById($id)
        {
        $sql = "SELECT * FROM enseignant WHERE Id_enseignant = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $enseignant = $req->fetch(PDO::FETCH_ASSOC);
            return $enseignant;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function updateenseignant($enseignant, $id) {
        $db = config::getConnexion();
        try {
            $db->beginTransaction();
            // Mise à jour de la table utilisateur
            $sql = "UPDATE utilisateur SET Nom = :Nom, Prenom = :Prenom, Email=:Email, Tel = :Tel, Password = :Password
                    WHERE Id_utilisateur = :id AND Role = 0";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'Nom' => $enseignant->getNom(),
                'Prenom' => $enseignant->getPrenom(),
                'Email' =>$enseignant->getEmail(),
                'Tel' => $enseignant->getTel(),
                'Password' => $enseignant->getPassword()
            ]);
    
            // Mise à jour de la table enseignant
            $sql = "UPDATE enseignant SET specialite = :specialite WHERE Id_enseignant = :id";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'specialite' => $enseignant->getSpecialite()
            ]);
            $db->commit();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $db->rollBack();
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function showuser($Id_enseignant) {
        // Joindre la table `enseignant` avec la table `utilisateur` pour obtenir des informations sur l'utilisateur associé à chaque élève
        $sql = "SELECT enseignant.*, utilisateur.Nom, utilisateur.Prenom, utilisateur.Email,utilisateur.Tel,utilisateur.Password 
                FROM enseignant 
                INNER JOIN utilisateur ON enseignant.Id_enseignant = utilisateur.Id_utilisateur 
                WHERE enseignant.Id_enseignant = :Id_enseignant"; 
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['Id_enseignant' => $Id_enseignant]);
            $enseignant = $query->fetch(PDO::FETCH_ASSOC);
            return $enseignant;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function addenseignantDetails($userId, $specialite) {
        $db = config::getConnexion();
        $sql = "INSERT INTO enseignant (Id_enseignant, specialite) VALUES (:Id_enseignant, :specialite) ON DUPLICATE KEY UPDATE specialite = :specialite";
        $query = $db->prepare($sql);
        $query->execute(['Id_enseignant' => $userId, 'specialite' => $specialite]);
    }
    public function checkLogin($email, $password) {
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare("SELECT * FROM utilisateur WHERE Email = :email AND Password = :password");
            $stmt->execute(['email' => $email, 'password' => $password]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($user); // Affiche les informations de l'utilisateur ou `false`
            return $user ? $user : false;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    
   
}
?>
