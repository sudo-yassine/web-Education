<?php
include '../Config.php';
include '../Model/utilisateur.php';

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
    }

    public function addUtilisateur($Utilisateur)
    {
        $sql = "INSERT INTO utilisateur  
                VALUES (NULL, :Nom, :Prenom, :Adresse, :Tel, :Password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Adresse' => $Utilisateur->getAdresse(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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
                    Adresse = :Adresse,
                    Tel = :Tel,
                    Password = :Password
                WHERE Id_utilisateur = :id'
            );
            $query->execute([
                'id' => $id,
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Adresse' => $Utilisateur->getAdresse(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword()
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
            $cours= $query->fetch();
            return $cours;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
