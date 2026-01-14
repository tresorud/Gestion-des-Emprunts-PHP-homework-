<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="file"] {
            width: 100%; 
            padding: 8px;
            box-sizing: border-box; 
            background-color: #f4f4f4;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button{
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        button:hover {
            background-color: #218838;
        }
        .error-msg {
            color: red;
            margin-bottom: 10px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    
</body>
</html>
<form action="" method="POST"
enctype="multipart/form-data">
    <label>Titre du livre<label>
        <input type="text" name="title" required>
        <label>Auteur du livre<label>
        <input type="text" name="author" required>
        <label>Emplacement du livre<label>
            <br>
        <input type="file" name="fichier" accept="fichier/*" required>
        <button type="submit" name="submit">Ajouter le livre</button>
</form>
<?php
$configPath = $_SERVER['DOCUMENT_ROOT'] . '/lha/config/db.php';

if (file_exists($configPath)) {
    include($configPath);
}
else {
    die("Erreur : Le fichier de configuration est introuvable a l'emplacement spécifié:"
. $configPath);
}
if (isset($_POST['submit']))
    if (!isset($conn)){
        die("Erreur : La connexion a la base de donnees (\$conn) n'est pas etablie.");
    }
    $tite = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $image = $_FILES['image']['name'];
    $target = "../image/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO livres (title, author, image) VALUES ('$title', '$author', '$image')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Livre ajoute avec succes!</p>";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<p style='color:red;'>Erreur lors du telechargement de l'image.Verifiez que le dossier '.../image/' existe</p>";
    }

    if(isset($conn)) {
        $conn->close();
    }
?>