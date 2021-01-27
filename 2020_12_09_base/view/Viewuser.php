<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Billet simple pour l'Alaska par chapitre!</h1>
    <?php
    if (isset($_GET['erreur'])) {
        $err = $_GET['erreur'];
        if ($err == 1 || $err == 2)
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
    ?>


    <form action="../index.php?action=connection" method="post">
        <div>
            <label for="user">Identifiant</label><br />
            <input type="text" id="user" name="user" />
        </div>
        <div>
            <label for="password">Mot de passe</label><br />
            <input type="password" name="password"></textarea>
        </div>
        <div>
            <input type="submit" id="submit" value="Connexion" />
        </div>
    </form>




</body>

</html>
<?php
?>