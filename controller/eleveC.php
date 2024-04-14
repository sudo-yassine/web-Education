<?php
include_once '../Model/eleve.php';
include_once 'utilisateurC.php';
class eleveC extends utilisateurC
{
    public function listeleves()
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

    public function deleteeleve($id)
    {
        $sql = "DELETE FROM eleve WHERE Id_eleve = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addeleve($eleve)
    {
        $sql = "INSERT INTO eleve  
                VALUES (NULL, :Nom, :Prenom, :Adresse, :Tel, :Password, NULL, :niveau)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Adresse' => $Utilisateur->getAdresse(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
                'niveau' =>$eleve->getNiveau()
            ]);
        } catch (Exception $e) {
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


    public function updateeleve($eleve, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE eleve SET 
                    Nom = :Nom, 
                    Prenom = :Prenom, 
                    Adresse = :Adresse,
                    Tel = :Tel,
                    Password = :Password,
                    niveau = :niveau
                WHERE Id_eleve = :id'
            );
            $query->execute([
                'id' => $id,
                'Nom' => $Utilisateur->getNom(),
                'Prenom' => $Utilisateur->getPrenom(),
                'Adresse' => $Utilisateur->getAdresse(),
                'Tel' => $Utilisateur->getTel(),
                'Password' => $Utilisateur->getPassword(),
                'niveau' =>$eleve->getNiveau()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showeleve($Id_eleve)
    {
        $sql = "SELECT * from eleve where Id_eleve = $Id_eleve";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $eleve= $query->fetch();
            return $eleve;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
