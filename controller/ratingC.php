<?php
include '../config.php';
include '../model/rating.php';

/*
recrut
recrutement
CREATE TABLE rating(
  id_rating int,
  date_entretien DATE,
  statu int,
  cv varchar(255),
  nb_question int,
  reponse varchar(255),
  FOREIGN KEY(id_enseignant) REFERENCES enseignant(id_enseignant)

);
*/
class ratingC
{
    public function ListRating()
    {
        $sql = "SELECT * FROM rating";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function Deleterating($id_rating)
    {
        $sql = "DELETE FROM rating WHERE id_rating = :id_rating";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rating', $id_rating);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function Addrating($rating)
    {
        $sql = "INSERT INTO rating
        VALUES (NULL, :nm,:pr)";
        $db = config::getConnexion();
        try {
            var_dump($rating);
            $query = $db->prepare($sql);
            $query->execute([
                'nm' => $rating->getstar(),
                'pr' => $rating->getcomment(),
             

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function Updaterating($rating, $id_rating)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE rating SET
            star = :star,
            comment = :comment,
           WHERE id_rating= :id_rating'
        );
        $query->execute([
            'id_rating' => $id_rating,
            'nm' => $rating->getstar(),
            'pr' => $rating->getcomment(),
        
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Afficher l'erreur PDO pour le débogage
    }
}

    function Showrating($id_rating)
    {
        $sql = "SELECT * from rating where id_rating = $id_rating";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $rating= $query->fetch();
            return $rating;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function listName($order = 'ASC')
    {
        $sql = "SELECT * FROM rating ORDER BY star $order";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function calculerPourcentageratingsParRating()
    {
        $db = config::getConnexion();

        try {
            // Sélectionner le nombre de réclamations pour chaque type depuis la base de données
            $query = $db->prepare('SELECT COUNT(*) AS total, star FROM rating GROUP BY star');
            $query->execute();
            $ratingsParType = $query->fetchAll(PDO::FETCH_ASSOC);

            // Initialiser un tableau pour stocker les pourcentages
            $pourcentages = [];

            // Calculer le pourcentage de réclamations pour chaque type
            $totalratings = 0;
            foreach ($ratingsParType as $rating) {
                $totalratings += $rating['total'];
            }

            foreach ($ratingsParType as $rating) {
                $pourcentage = ($rating['total'] / $totalratings) * 100;
                $pourcentages[$rating['star']] = $pourcentage;
            }

            return $pourcentages;
            } catch (PDOException $e) {
            echo "Erreur lors du calcul des pourcentages de rating par star: " . $e->getMessage();
            }
    }
    
    /*kaaba okhra lel ratings
    public function calculerPourcentageratingsParType()
    {
        $db = config::getConnexion();

        try {
            // Sélectionner le nombre de réclamations pour chaque type depuis la base de données
            $query = $db->prepare('SELECT COUNT(*) AS total, typee FROM rating GROUP BY typee');
            $query->execute();
            $ratingsParType = $query->fetchAll(PDO::FETCH_ASSOC);

            // Initialiser un tableau pour stocker les pourcentages
            $pourcentages = [];

            // Calculer le pourcentage de réclamations pour chaque type
            $totalratings = 0;
            foreach ($ratingsParType as $rating) {
                $totalratings += $rating['total'];
            }

            foreach ($ratingsParType as $rating) {
                $pourcentage = ($rating['total'] / $totalratings) * 100;
                $pourcentages[$rating['typee']] = $pourcentage;
            }

            return $pourcentages;
            } catch (PDOException $e) {
            echo "Erreur lors du calcul des pourcentages de réclamations par type: " . $e->getMessage();
            }
    }*/
}


