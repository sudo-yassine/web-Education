<?php
include '../config.php';
include '../model/recrut.php';

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
class recrutC
{
    public function listrecrut()
    {
        $sql = "SELECT * FROM recrut";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleterecrut($id_recrut)
    {
        $sql = "DELETE FROM recrut WHERE id_recrutement = :id_recrutement";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_recrutement', $id_recrut);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addrecrut($recrut)
    {
        $sql = "INSERT INTO recrut
        VALUES (NULL, :dr,:st,:cv,:nbq,:rp,:ide)";
        $db = config::getConnexion();
        try {
            var_dump($recrut);
            $query = $db->prepare($sql);
            $query->execute([
                'de' => $recrut->getdate_entretien(),
                'st' => $recrut->getstatu(),
                'cv' => $recrut->getcv(),
                'nbq' => $recrut->getnb_question(),               
                'rp' => $recrut->getreponse(),
                'ide' => $recrut->getid_enseignant()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updaterecrut($recrut, $id_recrutement)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE recrut SET
                date_entretien = :de,
                statu = :st,
                cv = :cbv,
                nb_questioncontnbq,n
                rp = :rp,                
                ide = :ideu = :c 
               WHERE id_recrutement= :id_recrutement'
            );
            $query->execute([
                'id' => $recrut->getid(),
                'de' => $recrut->getdate_entretien(),
                'st' => $recrut->getstatu(),
                'cv' => $recrut->getcv(),
                'nbq' => $recrut->getnb_question(),               
                'rp' => $recrut->getreponse(),
                'ide' => $recrut->getid_enseignant()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showrecrut($id_recrutement)
    {
        $sql = "SELECT * from recrut where id_recrutement = $id_recrutement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $recrut= $query->fetch();
            return $recrut;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}