<?php
// 1. Connexion à la base de données
require '../includes/db_link.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Nettoyage
    $email = trim($_POST['email'] ?? '');
    $motDePasse = $_POST['motDePasse'] ?? '';
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $birthdaydate = $_POST['birthdaydate'] ?? '';

    if (!empty($email) && !empty($motDePasse) && !empty($firstname) && !empty($lastname) && !empty($birthdaydate)) {
        
        // 1. Vérification doublon
        $checkSql = "SELECT email FROM Connexion WHERE email = :email";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute(['email' => $email]);

        if ($checkStmt->rowCount() > 0) {
            $message = "Cet email est déjà utilisé.";
        } else {
            // 2. Préparation
            $passwordHash = password_hash($motDePasse, PASSWORD_DEFAULT);

            // 3. TRANSACTION (Pour sécuriser les 2 insertions)
            try {
                $pdo->beginTransaction();

                // Insertion TABLE 1 : Connexion
                $sql1 = "INSERT INTO Connexion (email, motDePasse) VALUES (:email, :motDePasse)";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->execute([
                    'email' => $email, 
                    'motDePasse' => $passwordHash
                ]);

                // Insertion TABLE 2 : Client
                $sql2 = "INSERT INTO Clients (nom, prenom, dateNaissance, dateInscription) VALUES (:lastname, :firstname, :birthdaydate, NOW())";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute([
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'birthdaydate' => $birthdaydate
                ]);

                // Si on arrive ici sans erreur, on valide tout !
                $pdo->commit();
                $message = "<span class='text-success'>Compte créé ! <a href='login.php'>Connectez-vous</a></span>";

            } catch (Exception $e) {
                // En cas d'erreur sur l'une des tables, on annule tout.
                $pdo->rollBack();
                $message = "Erreur technique : " . $e->getMessage();
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurus | Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ressources/images/aurus_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login_page.css">
</head>
<body>
    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Bienvenue</h2>
        <div class="text-center mb-5 text-dark">Inscrivez-vous !</div>
        <div class="card my-5">
        <?php if(!empty($message)): ?>
          <div class="alert alert-danger text-center"><?php echo $message; ?></div>
        <?php endif; ?>
          <form class="card-body cardbody-color p-lg-5" method="POST" action="">

            <div class="text-center">
              <img src="../ressources/images/aurus_logo2.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Adresse e-mail" required>
            </div>

            <div class="mb-3">
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom" required>
            </div>

            <div class="mb-3">
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom de famille" required>
            </div>

            <div class="mb-3">
              <input type="date" name="birthdaydate" class="form-control" id="birthdaydate" placeholder="Date de naissance"  required>
            </div>

            <div class="mb-3">
              <input type="password" name="motDePasse" class="form-control" id="motDePasse" placeholder="Mot de Passe" required>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">S'inscrire</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Vous avez déjà un compte ?
              <a href="login.php" class="text-dark fw-bold"> Se connecter. </a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>