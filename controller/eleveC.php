<?php
include_once '../Model/eleve.php';
include_once 'utilisateurC.php';
class eleveC extends utilisateurC
{
    public function listeleves()
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
    
    public function deleteeleve($Id_eleve)
    {
        $sql = "DELETE eleve FROM eleve
                INNER JOIN utilisateur ON eleve.Id_eleve = utilisateur.Id_utilisateur
                WHERE eleve.Id_eleve = :Id_eleve";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id_eleve', $Id_eleve);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    public function addeleve($eleve)
{
    $sql = "INSERT INTO eleve (Id_utilisateur, Nom, Prenom, Adresse, Tel, Password, Id_eleve, niveau)  
            VALUES (:Id_utilisateur, :Nom, :Prenom, :Adresse, :Tel, :Password, :Id_eleve, :niveau)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'Id_utilisateur' => $eleve->getId(),
            'Nom' => $eleve->getNom(),
            'Prenom' => $eleve->getPrenom(),
            'Adresse' => $eleve->getAdresse(),
            'Tel' => $eleve->getTel(),
            'Password' => $eleve->getPassword(),
            'Id_eleve' => $eleve->getId_eleve(),
            'niveau' => $eleve->getNiveau()
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
                        eleve = :eleve
                    WHERE Id_eleve = :id'
                );
                $query->execute([
                    'id' => $id,
                    'Nom' => $eleve->getNom(),
                    'Prenom' => $eleve->getPrenom(),
                    'Adresse' => $eleve->getAdresse(),
                    'Tel' => $eleve->getTel(),
                    'Password' => $eleve->getPassword(),
                    'niveau' => $eleve->getNiveau()
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
