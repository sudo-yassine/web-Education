<?php
include '../config.php';
include '../model/Recrut.php';
  /*
    CREATE TABLE recrut(
        id_recrutement int,
        date_entretien DATE,
        statu int,
        cv varchar(255),
        nb_question int,
        reponse varchar(255),
        FOREIGN KEY(id_enseignant) REFERENCES enseignant(id_enseignant)      
      );
    */

class RecrutC
{
    public function listRecrut()
    {
        $sql = "SELECT * FROM Recrut";
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

    function deleteRecrut($id_recrutement)
    {
        $sql = "DELETE FROM Recrut WHERE id_recrutement = :id_recrutement";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_recrutement', $id_recrutement);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addRecrut($Recrut)
    {
        $sql = "INSERT INTO Recrut  
        VALUES (NULL, :id_recrutement,:date_entretien, :statu, :cv, :nb_question, :reponse)";
        $db = config::getConnexion();
        try {
            var_dump($Recrut);
            $query = $db->prepare($sql);
            $query->execute([
                'id_recrutement' => $Recrut->getid_ecrut(),
                'date_entretien' => $Recrut->getdate_entretien(),
                'statu' => $Recrut->getstatu(),
                'cv' => $Recrut->getcv(),
                'nb_question' => $Recrut->getnb_question(),
                'reponse' => $Recrut->getreponse()


            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateRecrut($Recrut, $id_recrutement)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Recrut SET 
                    id_recrutement = :id_recrutement, 
                    date_entretien = :date_entretien, 
                    statu = :statu,
                    cv = :cv,
                    nb_question = :nb_question,
                    reponse = :reponse
                WHERE id_recrutement= :id_recrutement'
            );
            $query->execute([
                'id_recrutement' => $Recrut->getid_ecrut(),
                'date_entretien' => $Recrut->getdate_entretien(),
                'statu' => $Recrut->getstatu(),
                'cv' => $Recrut->getcv(),
                'nb_question' => $Recrut->getnb_question(),
                'reponse' => $Recrut->getreponse()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showRecrut($id_recrutement)
    {
        $sql = "SELECT * from Recrut where id_recrutement = $id_recrutement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Recrut = $query->fetch();
            return $Recrut;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}