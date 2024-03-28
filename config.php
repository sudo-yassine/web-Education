<?php
<<<<<<< HEAD
<<<<<<< HEAD
class config
{
    private static $pdo = null;
=======

class config
{
    private static $pdo = null;

>>>>>>> origin/recrut
=======
class config
{
    private static $pdo = null;
>>>>>>> origin/utilisateur
    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
<<<<<<< HEAD
                    'mysql:host=localhost;dbname=WisdomWave',
=======
                    'mysql:host=localhost;dbname=education',
>>>>>>> origin/utilisateur
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/recrut
=======
}
>>>>>>> origin/utilisateur
