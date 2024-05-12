<?php
include '../config.php';
include '../Model/admin.php';

class adminC
{
    public function listAdmins()
    {
        $sql = "SELECT * FROM adminisatrateur";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteAdmin($id)
    {
        $sql = "DELETE FROM adminisatrateur WHERE Id_admin = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addAdmin($admin)
{
    $sql = "INSERT INTO adminisatrateur (niveau, nom, prenom, pass,email)  
            VALUES (:niveau, :nom, :prenom, :pass,:email)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'niveau' => $admin->getniveau(),
            'nom' => $admin->getnom(),
            'prenom' => $admin->getprenom(),
            'pass' => $admin->getpassword(),
            'email' =>$admin->getEmail()
        ]);

        // Retourner true si l'ajout a réussi
        return true;
    } catch (Exception $e) {
        // Journaliser l'erreur ou renvoyer une exception à l'appelant pour une gestion plus robuste des erreurs
        error_log('Error adding admin: ' . $e->getMessage());
        // Retourner false en cas d'échec
        return false;
    }
}

    public function getAdminById($id)
        {
        $sql = "SELECT * FROM adminisatrateur WHERE Id_admin = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $admin = $req->fetch(PDO::FETCH_ASSOC);
            return $admin;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function updateAdmin($admin, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE administrateur SET 
                    niveau = :niveau,
                    nom = :nom, 
                    prenom = :prenom, 
                    pass = :pass,
                    email = :email
                WHERE Id_admin = :id'
            );
            $query->execute([
                'id' => $id,
                'niveau' => $admin->getniveau(),
                'nom' => $admin->getnom(),
                'prenom' => $admin->getprenom(),
                'pass' => $admin->getpassword(),
                'email' =>$admin->getEmail()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showAdmin($Id_admin)
    {
        $sql = "SELECT * from adminisatrateur where Id_admin = $Id_admin";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $admin= $query->fetch();
            return $admin;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function validateAdminLogin($email, $password) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT pass FROM adminisatrateur WHERE email = :email");
        $stmt->execute(['email' => $email]); // Assurez-vous que les clés utilisées dans execute() sont correctement entre guillemets
    
        $hashed_password = $stmt->fetchColumn();
    
        // Vérifiez si le mot de passe haché correspond au mot de passe fourni
        if ($hashed_password && password_verify($password, $hashed_password)) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
    
    

    public function checkAdminByEmail($email) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT COUNT(*) FROM adminisatrateur WHERE email = ?");
        $stmt->execute([$email]); // Assurez-vous que cela correspond au nom de la table correctement orthographié
    
        // Vérifiez s'il y a des erreurs lors de l'exécution de la requête
        if ($stmt->errorCode() != "00000") {
            $errors = $stmt->errorInfo();
            echo "Erreur SQL : " . $errors[2];
            return false;
        }
    
        // Vérifiez le nombre de lignes retournées
        $rowCount = $stmt->fetchColumn();
        echo "Nombre de lignes trouvées : " . $rowCount;
    
        // Retourne true si au moins une correspondance est trouvée, sinon retourne false
        return $rowCount > 0;
    }
    
    
    
    
}
?>