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
    public function ListRecrut()
    {
        $sql = "SELECT * FROM recrut";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } 
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function DeleteRecrut($id_recrutement)
    {
        $sql = "DELETE FROM recrut WHERE id_recrutement = :id_recrutement";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_recrutement', $id_recrutement);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function AddRecrut($Recrut)
    {
        $sql = "INSERT INTO recrut VALUES (NULL, :de,:st,:cv,:nbq,:rp,:ide)";
        $db = config::getConnexion();
        try {
            var_dump($Recrut);
            $query = $db->prepare($sql);
            $query->execute([
                'de' => $Recrut->getdate_entretien(),
                'st' => $Recrut->getstatu(),
                'cv' => $Recrut->getcv(),
                'nbq' => $Recrut->getnb_question(),               
                'rp' => $Recrut->getreponse(),
                'ide' => $Recrut->getid_enseignant()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function UpdateRecrut($Recrut, $id_recrutement)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE recrut SET
                date_entretien = :de,
                statu = :st,
                cv = :cbv,
                nb_question = :nbq,
                reponse = :rp,                
                id_enseignant = :ide 
               WHERE id_recrutement= :id_recrutement'
            );
            $query->execute([
                'id_recrutement' => $id_recrutement,
                'de' => $Recrut->getdate_entretien(),
                'st' => $Recrut->getstatu(),
                'cbv' => $Recrut->getcv(),
                'nbq' => $Recrut->getnb_question(),               
                'rp' => $Recrut->getreponse(),
                'ide' => $Recrut->getid_enseignant(),
                'id_recrutement' => $id_recrutement
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function ShowRecrut($id_recrutement)
    {
        $sql = "SELECT * from recrut where id_recrutement = $id_recrutement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Recrut= $query->fetch();
            return $Recrut;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

}

