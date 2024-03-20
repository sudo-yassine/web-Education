<?php
include '../config.php';
include '../model/cours.php';

class coursC
{
    public function listcours()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);


            // Fetch all rows as an associative array
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
        VALUES (NULL, :n,:h,:nv,:c)";
        $db = config::getConnexion();
        try {
            var_dump($cours);
            $query = $db->prepare($sql);
            $query->execute([
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
                nom_cours = :n,
                heures = :h,
                niveau = :nv,
                contenu = :c 
                
               WHERE id_cours= :id_cours'
            );
            $query->execute([
                'id_cours' => $id_cours,
               'n'=>$cours->getnom_cours(),
               'h'=>$cours->getheures(),
               'nv'=>$cours->getniveau(),
               'c'=>$cours->getcontenu(),
                'id_cours' => $id_cours
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showcours($id_cours)
    {
        $sql = "SELECT * from cours where id_cours = $id_cours";
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
