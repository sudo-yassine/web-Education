<?php
include_once '../config.php';   
include_once '../model/ressources.php';
// include_once '../model/examen.php';
class ressourcesC
{

    public function listexamen($id_ressources)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM examen WHERE id_ressources = :id");
            $query->execute(['id' => $id_ressources]);
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }
    


    public function listressources()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM ressources");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage(); 
        }
    }

    function deleteressources($id_ressources)
    {
        $sql = "DELETE FROM ressources WHERE id_ressources = :id_ressources";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_ressources', $id_ressources);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addressources($ressources)
    {
        $sql = "INSERT INTO ressources (description_ressources, livre, playlist_ytb, id_examen) VALUES (:n,:h,:nv,:id_examen)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $ressources->getdescription_ressources(),
                'h' => $ressources->getlivre(),
                'nv' => $ressources->getplaylist_ytb(),
                'id_examen' => $ressources->getid_examen()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateressources($ressources, $id_ressources)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ressources SET
                description_ressources = :n,
                livre = :h,
                playlist_ytb = :nv,
                id_examen = :id_examen
               WHERE id_ressources= :id_ressources'
            );
            $query->execute([
                'n' => $ressources->getdescription_ressources(),
                'h' => $ressources->getlivre(),
                'nv' => $ressources->getplaylist_ytb(),
                'id_examen' => $ressources->getid_examen(),
                'id_ressources' => $id_ressources
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showressources($id_ressources)
    {
        $sql = "SELECT * from ressources where id_ressources = $id_ressources";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ressources= $query->fetch();
            return $ressources;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
