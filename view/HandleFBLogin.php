<?php
session_start();

// Correction: supprimez le $ inutile dans la clé
$accessToken = $_POST['accessToken']; 

// Supposons que vous avez une fonction qui fait cela et renvoie les données utilisateur ou false si non valide
$user = verifyFacebookAccessToken($accessToken);

if ($user) {
    $_SESSION['user_id'] = $user['id'];  // Ou une autre forme de gestion de session
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid access token']);
}

/**
 * Implémente la vérification du token d'accès Facebook.
 * Appelle l'API Facebook pour valider le token et récupérer les données utilisateur.
 */
function verifyFacebookAccessToken($token) {
    if (!$token) {
        return false;
    }
    
    $url = "https://graph.facebook.com/me?access_token=$token&fields=id,name,email";
    
    try {
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['error'])) {
            error_log('Facebook API error: ' . $data['error']['message']);
            return false;
        }

        return $data;  // Renvoie les données utilisateur récupérées si le token est valide
    } catch (Exception $e) {
        error_log('Error verifying Facebook access token: ' . $e->getMessage());
        return false;
    }
}
?>
