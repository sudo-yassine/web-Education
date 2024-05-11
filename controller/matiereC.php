<?php
include '../config.php';
include '../model/matiere.php';

class matiereC
{
    public function listMatieres()
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

  function addmatiere($matiere)
{
    $sql = "INSERT INTO matiere
            VALUES (NULL, :nom, :description, :resources)";
    $db = config::getConnexion(); // Assuming `config` is your configuration class
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $matiere->getNomMatiere(),
            'description' => $matiere->getDescription(),
            'resources' => $matiere->getResources()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
 

    public function deleteMatiere($id_matiere)
    {
        $sql = "DELETE FROM matiere WHERE id_matiere = :id_matiere";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_matiere', $id_matiere);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updatematiere($matiere, $id_matiere)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE matiere SET
            nom_matiere = :nom_matiere,
            description = :description,
            resources = :resources
            WHERE id_matiere = :id_matiere'
        );
        $query->execute([
            'nom_matiere' => $matiere->getNomMatiere(),
            'description' => $matiere->getDescription(),
            'resources' => $matiere->getResources(),
            'id_matiere' => $id_matiere
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

    

    public function showMatiere($id_matiere)
    {
        $sql = "SELECT * FROM matiere WHERE id_matiere = :id_matiere";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_matiere' => $id_matiere]);
            $matiere = $query->fetch(PDO::FETCH_ASSOC);
            return $matiere;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
