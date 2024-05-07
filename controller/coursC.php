<?php
include '../config.php';
include '../model/cours.php';

class coursC
{
  private $db; // PDO database connection


public function functionstat()
    {
        $db = config::getConnexion();

        try {
            // Sélectionner le nombre de réclamations pour chaque type depuis la base de données
            $query = $db->prepare('SELECT COUNT(*) AS total, heures FROM cours GROUP BY heures');
            $query->execute();
            $coursparheures = $query->fetchAll(PDO::FETCH_ASSOC);

            // Initialiser un tableau pour stocker les pourcentages
            $pourcentages = [];

            // Calculer le pourcentage de réclamations pour chaque type
            $totalcours = 0;
            foreach ($coursparheures as $cours) {
                $totalcours += $cours['total'];
            }

            foreach ($coursparheures as $cours) {
                $pourcentage = ($cours['total'] / $totalcours) * 100;
                $pourcentages[$cours['heures']] = $pourcentage;
            }

            return $pourcentages;
            } catch (PDOException $e) {
            echo "Erreur lors du calcul " . $e->getMessage();
            }

        }




function calculateTotalHoursForSubject($subjectId) {
    global $coursC;
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT SUM(heures) AS total_hours FROM cours WHERE matiere = :subjectId");
        $query->execute(['subjectId' => $subjectId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['total_hours'];
    } catch (PDOException $e) {
        echo $e->getMessage(); 
        return 0; // Return 0 in case of error
    }
}
    
public function searchByNiveau($niveau) {
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * FROM cours WHERE niveau = :niveau");
        $query->execute(['niveau' => $niveau]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    }
}






 public function searchByHours($hours) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM cours WHERE heures = :hours");
            $query->execute(['hours' => $hours]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage(); 
        }
    }



public function affichercours($matiereId)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM cours WHERE matiere = :matiereId");
            $query->execute(['matiereId' => $matiereId]);
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }

    public function affichermatiere()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM matiere");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }



public function verifyMatiereExists($matiereId)
    {
        $sql = "SELECT COUNT(*) AS count FROM matiere WHERE id_matiere = :id_matiere";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_matiere', $matiereId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] > 0;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function listmatieres()
    {
        $sql = "SELECT * FROM matiere";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listcours()
    {
        $sql = "SELECT c.*, m.nom_matiere 
                FROM cours c
                INNER JOIN matiere m ON c.matiere = m.id_matiere";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecours($id_cours)
    {
        $sql = "DELETE FROM cours WHERE id_cours = :id_cours";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_cours', $id_cours);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcours($cours)
    {
        $sql = "INSERT INTO cours
                VALUES (NULL, :matiere, :n, :h, :nv, :c)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'matiere' => $cours->getmatiere(), 
                'n' => $cours->getnom_cours(),
                'h' => $cours->getheures(),
                'nv' => $cours->getniveau(),
                'c' => $cours->getcontenu()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatecours($cours, $id_cours)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE cours SET
                matiere = :matiere,
                nom_cours = :n,
                heures = :h,
                niveau = :nv,
                contenu = :c 
                WHERE id_cours = :id_cours'
            );
            $query->execute([
                'matiere' => $cours->getmatiere(),
                'n' => $cours->getnom_cours(),
                'h' => $cours->getheures(),
                'nv' => $cours->getniveau(),
                'c' => $cours->getcontenu(),
                'id_cours' => $id_cours
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showcours($id_cours)
    {
        $sql = "SELECT c.*, m.nom_matiere 
                FROM cours c
                INNER JOIN matiere m ON c.matiere = m.id_matiere
                WHERE c.id_cours = :id_cours"; 
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_cours' => $id_cours]);
            $cours = $query->fetch();
            return $cours;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
