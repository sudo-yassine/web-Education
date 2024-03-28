<?php
include '../config.php';
include '../model/examen.php';
class examenC
{
    public function listexamen()
    {
        $sql = "SELECT * FROM examen";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteexamen($id_examen)
    {
        $sql = "DELETE FROM examen WHERE id_examen = :id_examen";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_examen', $id_examen);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addexamen($examen)
    {
        $sql = "INSERT INTO examen
        VALUES (NULL, :n,:h,:nv,:c)";
        $db = config::getConnexion();
        try {
            var_dump($examen);
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $examen->getid_cours(),
                'h' => $examen->gettitre(),
                'nv' => $examen->getdescription(),
                'c' => $examen->getdate_limite()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateexamen($examen, $id_examen)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE examen SET
                id_cours = :n,
                titre = :h,
                description = :nv,
                date_limite = :c 
               WHERE id_examen= :id_examen'
            );
            $query->execute([
                'id_examen' => $id_examen,
               'n'=>$examen->getid_cours(),
               'h'=>$examen->gettitre(),
               'nv'=>$examen->getdescription(),
               'c'=>$examen->getdate_limite(),
                'id_examen' => $id_examen
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showexamen($id_examen)
    {
        $sql = "SELECT * from examen where id_examen = $id_examen";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $examen= $query->fetch();
            return $examen;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}