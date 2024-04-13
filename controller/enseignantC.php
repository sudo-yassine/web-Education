<?php
include_once '../Model/enseignant.php';
include_once 'utilisateurC.php';
class enseignantC extends utilisateurC
{
    public function listEnseignants()
    {
        $sql = "SELECT * FROM enseignant";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteEnseignant($id)
    {
        $sql = "DELETE FROM enseignant WHERE Id_enseignant = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addEnseignant($enseignant)
    {
        $sql = "INSERT INTO enseignant  
                VALUES (NULL, :Nom, :Prenom, :Adresse, :Tel, :Password, NULL, :specialite)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Adresse' => $Utilisateur->getAdresse(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
                'specialite' =>$enseignant->getSpecialite()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getEnseignantById($id)
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


    public function updateEnseignant($enseignant, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE enseignant SET 
                    Nom = :Nom, 
                    Prenom = :Prenom, 
                    Adresse = :Adresse,
                    Tel = :Tel,
                    Password = :Password,
                    specialite = :specialite
                WHERE Id_enseignant = :id'
            );
            $query->execute([
                'id' => $id,
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Adresse' => $Utilisateur->getAdresse(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
                'specialite' =>$enseignant->getEnseignant()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showenseignant($Id_enseignant)
    {
        $sql = "SELECT * from enseignant where Id_enseignant = $Id_enseignant";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $enseignant= $query->fetch();
            return $enseignant;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
