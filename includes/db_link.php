<?php
// 1. Vos paramètres de connexion
$host = 'localhost';
$dbname = 'aurus_db'; // <--- IMPORTANT : Remplacez ceci par le VRAI nom de votre base
$username = 'root';
$password = 'VPS@Loonny1!'; 

try {
    // 2. Chaîne de connexion (DSN) avec encodage utf8mb4 (pour les accents et emojis)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    // 3. Options PDO pour la sécurité et le confort
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Active les exceptions en cas d'erreur
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Renvoie les données sous forme de tableau associatif
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Désactive l'émulation pour une meilleure sécurité (natif)
    ];

    // 4. Création de l'instance PDO (La connexion elle-même)
    $pdo = new PDO($dsn, $username, $password, $options);

    // (Optionnel) Décommenter la ligne ci-dessous pour tester si la connexion marche :
    // echo "Connexion réussie !";

} catch (PDOException $e) {
    // En cas d'erreur, on arrête le script et on affiche le message
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
