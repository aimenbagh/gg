<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $nom = $prenom = $genre = $civilite = $adresse = $date_naissance = $telephone = "";
    $statut = $langues = [];
    $errors = [];

// Database connection
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Function to sanitize user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate and sanitize input fields
    if (!empty($_POST["Nom"])) {
        $nom = test_input($_POST["Nom"]);
        if (!preg_match("/^[a-zA-Z\s-]+$/", $nom)) {
            $errors[] = "Le nom ne doit contenir que des lettres.";
        }
    } else {
        $errors[] = "Le nom est requis.";
    }

    if (!empty($_POST["Prenom"])) {
        $prenom = test_input($_POST["Prenom"]);
        if (!preg_match("/^[a-zA-Z\s-]+$/", $prenom)) {
            $errors[] = "Le prénom ne doit contenir que des lettres.";
        }
    } else {
        $errors[] = "Le prénom est requis.";
    }

    if (!empty($_POST["Genre"])) {
        $genre = test_input($_POST["Genre"]);
    } else {
        $errors[] = "Le genre est requis.";
    }

    if (!empty($_POST["Civilité"])) {
        $civilite = test_input($_POST["Civilité"]);
    }

    if (!empty($_POST["Adresse"])) {
        $adresse = test_input($_POST["Adresse"]);
    }

    if (!empty($_POST["Date_naissance"])) {
        $date_naissance = test_input($_POST["Date_naissance"]);
    }

    if (!empty($_POST["Telephone"])) {
        $telephone = test_input($_POST["Telephone"]);
        if (!preg_match("/^[0-9]+$/", $telephone)) {
            $errors[] = "Le téléphone ne doit contenir que des chiffres.";
        }
    } else {
        $errors[] = "Le téléphone est requis.";
    }

    if (!empty($_POST["Statut"])) {
        foreach ($_POST["Statut"] as $value) {
            $statut[] = test_input($value);
        }
    }

    if (!empty($_POST["langue"])) {
        foreach ($_POST["langue"] as $value) {
            $langues[] = test_input($value);
        }
    }

    // Display errors if any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        // Process the sanitized input (for debugging purposes)
        echo "Nom: $nom<br>";
        echo "Prénom: $prenom<br>";
        echo "Genre: $genre<br>";
        echo "Civilité: $civilite<br>";
        echo "Adresse: $adresse<br>";
        echo "Date de Naissance: $date_naissance<br>";
        echo "Telephone: $telephone<br>";
        echo "Statut: " . implode(", ", $statut) . "<br>";
        echo "Langues maîtrisées: " . implode(", ", $langues) . "<br>";
    }
}
?>
</body>
</html>
