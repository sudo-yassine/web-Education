<?php
include_once '../Model/examenfinal.php';
include_once 'examenC.php';
class examenfinalC extends examenC
{
    public function listexamenfinal()
    {
        $sql = "SELECT examen.id_examen, examen.id_cours, examen.titre, examen.description, examen.duree, examenfinal.id_examenfinal, examenfinal.difficulte FROM examen INNER JOIN examenfinal ON examen.id_examen = examenfinal.id_examenfinal";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    public function deleteexamenfinal($id_examenfinal)
    {
        $sql = "DELETE examenfinal FROM examenfinal
                INNER JOIN examen ON examenfinal.id_examenfinal = examen.id_examen
                WHERE examenfinal.id_examenfinal = :id_examenfinal";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_examenfinal', $id_examenfinal);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    public function addexamenfinal($examenfinal)
{
    $sql = "INSERT INTO examenfinal (id_examenfinal, difficulte) 
            VALUES (:id_examenfinal, :difficulte)";
    $db = config::getConnexion();
    try {
        // Récupérer l'ID de l'examen associé à l'élève
        $id_examen = $examenfinal->getId();

        // Préparer et exécuter la requête d'insertion
        $query = $db->prepare($sql);
        $query->execute([
            'id_examenfinal' => $id_examen, // Utiliser l'ID de l'examen comme ID de l'élève
            'difficulte' => $examenfinal->getdifficulte() // Récupérer le difficulte de l'élève depuis l'objet examenfinal
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    public function getexamenfinalById($id)
        {
        $sql = "SELECT * FROM examenfinal WHERE id_examenfinal = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $examenfinal = $req->fetch(PDO::FETCH_ASSOC);
            return $examenfinal;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function updateexamenfinal($examenfinal, $id)
    {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE examenfinal SET 
                        id_cours = :n, 
                        titre = :h, 
                        description = :nv,
                        duree = :c,
                        difficulte = :difficulte,
                        -- examenfinal = :examenfinal
                    WHERE id_examenfinal = :id'
                );
                $query->execute([
                    'n' => $examenfinal->getid_cours(),
                    'h' => $examenfinal->gettitre(),
                    'nv' => $examenfinal->getdescription(),
                    'c' => $examenfinal->getduree(),
                    'difficulte' => $examenfinal->getdifficulte()
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        
    }
    function showexamenfinal($id_examenfinal)
    {
        $sql = "SELECT * from examenfinal where id_examenfinal = $id_examenfinal";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $examenfinal= $query->fetch();
            return $examenfinal;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>