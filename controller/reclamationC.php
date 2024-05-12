<?php
include_once '../config.php';
include_once '../model/reclamations.php';

/*
recrut
recrutement
CREATE TABLE reclamation(
  id_reclamation int,
  date_entretien DATE,
  statu int,
  cv varchar(255),
  nb_question int,
  reponse varchar(255),
  FOREIGN KEY(id_enseignant) REFERENCES enseignant(id_enseignant)

);
*/
class reclamationC
{
    public function Listreclamtion()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function Deletereclamation($id_reclamation)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation = :id_reclamation";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_reclamation', $id_reclamation);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function Addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation
        VALUES (NULL, :nm,:pr,:em,:tel,:ty,:ds)";
        $db = config::getConnexion();
        try {
            var_dump($reclamation);
            $query = $db->prepare($sql);
            $query->execute([
                'nm' => $reclamation->getnom(),
                'pr' => $reclamation->getprenom(),
                'em' => $reclamation->getemail(),
                'tel'=> $reclamation->gettelephone(),               
                'ty' => $reclamation->gettypee(),
                'ds' => $reclamation->getdescp()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function Updatereclamation($reclamation, $id_reclamation)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reclamation SET
            nom = :nm,
            prenom = :pr,
            email = :em,
            telephone = :tel,
            typee = :ty,                
            descp = :ds 
           WHERE id_reclamation= :id_reclamation'
        );
        $query->execute([
            'id_reclamation' => $id_reclamation,
            'nm' => $reclamation->getnom(),
            'pr' => $reclamation->getprenom(),
            'em' => $reclamation->getemail(),
            'tel' => $reclamation->gettelephone(),               
            'ty' => $reclamation->gettypee(),
            'ds' => $reclamation->getdescp()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Afficher l'erreur PDO pour le débogage
    }
}

    function Showreclamation($id_reclamation)
    {
        $sql = "SELECT * from reclamation where id_reclamation = $id_reclamation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclamation= $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function listName($order = 'ASC')
    {
        $sql = "SELECT * FROM reclamation ORDER BY nom $order";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function calculerPourcentageReclamationsParType()
    {
        $db = config::getConnexion();

        try {
            // Sélectionner le nombre de réclamations pour chaque type depuis la base de données
            $query = $db->prepare('SELECT COUNT(*) AS total, typee FROM Reclamation GROUP BY typee');
            $query->execute();
            $reclamationsParType = $query->fetchAll(PDO::FETCH_ASSOC);

            // Initialiser un tableau pour stocker les pourcentages
            $pourcentages = [];

            // Calculer le pourcentage de réclamations pour chaque type
            $totalReclamations = 0;
            foreach ($reclamationsParType as $reclamation) {
                $totalReclamations += $reclamation['total'];
            }

            foreach ($reclamationsParType as $reclamation) {
                $pourcentage = ($reclamation['total'] / $totalReclamations) * 100;
                $pourcentages[$reclamation['typee']] = $pourcentage;
            }

            return $pourcentages;
            } catch (PDOException $e) {
            echo "Erreur lors du calcul des pourcentages de réclamations par type: " . $e->getMessage();
            }
    }
    
    /*kaaba okhra lel ratings
    public function calculerPourcentageReclamationsParType()
    {
        $db = config::getConnexion();

        try {
            // Sélectionner le nombre de réclamations pour chaque type depuis la base de données
            $query = $db->prepare('SELECT COUNT(*) AS total, typee FROM Reclamation GROUP BY typee');
            $query->execute();
            $reclamationsParType = $query->fetchAll(PDO::FETCH_ASSOC);

            // Initialiser un tableau pour stocker les pourcentages
            $pourcentages = [];

            // Calculer le pourcentage de réclamations pour chaque type
            $totalReclamations = 0;
            foreach ($reclamationsParType as $reclamation) {
                $totalReclamations += $reclamation['total'];
            }

            foreach ($reclamationsParType as $reclamation) {
                $pourcentage = ($reclamation['total'] / $totalReclamations) * 100;
                $pourcentages[$reclamation['typee']] = $pourcentage;
            }

            return $pourcentages;
            } catch (PDOException $e) {
            echo "Erreur lors du calcul des pourcentages de réclamations par type: " . $e->getMessage();
            }
    }*/
}


