<?php
session_start();
require '../includes/db_link.php'; 

$error_msg = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email'] ?? '');
    $motDePasse = $_POST['motDePasse'] ?? '';

    if (!empty($email) && !empty($motDePasse)) {
        
        // On récupère l'utilisateur par son email
        $sql = "SELECT * FROM Connexion WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        
        // 1. On vérifie $user['motDePasse']
        if ($user && password_verify($motDePasse, $user['motDePasse'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            
            header("Location: ../index.php"); 
            exit;
        } else {
            $error_msg = "Email ou mot de passe incorrect.";
        }
    } else {
        $error_msg = "Veuillez remplir tous les champs.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurus | Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ressources/images/aurus_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login_page.css">
</head>
<body>
    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Bienvenue</h2>
        <div class="text-center mb-5 text-dark">Connectez ou inscrivez-vous !</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" method="POST" action="">

            <div class="text-center">
              <img src="../ressources/images/aurus_logo2.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Adresse e-mail">
            </div>
            <div class="mb-3">
              <input type="password" name="motDePasse" class="form-control" id="motDePasse" placeholder="Mot de Passe" required>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Se connecter</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Vous êtes nouveau ?
              <a href="register.php" class="text-dark fw-bold"> Créer un compte. </a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

