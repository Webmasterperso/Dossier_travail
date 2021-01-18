<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Billet simple pour l'Alaska - Nouveau chapitre</h1>
    <form action="../index.php" method="post">
        <div>
            <label for="titlechapter">Titre du chapitre</label><br />
            <input type="text" id="titlechapter" name="titlechapter" value="<?= htmlspecialchars($datachapter['title_chapter']); ?>" />
        </div>
        <div>
            <label for="textchapter">Texte</label><br />
            <textarea id="textchapter" name="textchapter" cols="80" rows="20" ><? echo nl2br(htmlspecialchars($datachapter['text_chapter'])); ?></textarea>
        </div>
        <div>
            <?php
            if (isset($_GET['id_chapter'])) {
                echo '<input type="submit" name="Modifier" value="modifier" />';
            } else {
                echo '<input type="submit" name="Enregistrer" value="enregistrer" />';
            }
            ?>
            <input type="submit" name="Publier" value="publier" />
        </div>
    </form>
</body>

</html>