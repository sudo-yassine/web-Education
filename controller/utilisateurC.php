<?php
include_once '../config.php';
include_once '../Model/utilisateur.php';

class utilisateurC
{
    public function listUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
/*
    public function deleteUtilisateur($id)
    {
        $sql = "DELETE FROM utilisateur WHERE Id_utilisateur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/
    function deleteutilisateur($Id_utilisateur)
    {
        $sql = "DELETE FROM utilisateur WHERE Id_utilisateur = :Id_utilisateur";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id_utilisateur', $Id_utilisateur);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addUtilisateur($Utilisateur) {
        $sql = "INSERT INTO utilisateur (Nom, Prenom, Email, Tel, Password, Role) VALUES (:Nom, :Prenom, :Email, :Tel, :Password, :Role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Email' => $Utilisateur->getEmail(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
                'Role' => $Utilisateur->getRole()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
    public function getUtilisateurById($id)
        {
        $sql = "SELECT * FROM utilisateur WHERE Id_utilisateur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $utilisateur = $req->fetch(PDO::FETCH_ASSOC);
            return $utilisateur;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function updateUtilisateur($Utilisateur, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    Nom = :Nom, 
                    Prenom = :Prenom, 
                    Email = :Email,
                    Tel = :Tel,
                    Password = :Password,
                    Role= :Role
                WHERE Id_utilisateur = :id'
            );
            $query->execute([
                'id' => $id,
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Email' => $Utilisateur->getEmail(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
                'Role' =>$Utilisateur->getRole()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showuser($Id_utilisateur)
    {
        $sql = "SELECT * from utilisateur where Id_utilisateur = $Id_utilisateur";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $utilisateur= $query->fetch();
            return $utilisateur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
