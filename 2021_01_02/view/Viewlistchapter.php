<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Mon super blog !</h1>
    
    <h2>Liste des chapitres</h2>
    <p>En date du 
    <?php
        $datefr = date("d-m-Y");
        echo $datefr;
    ?></p>

    <?php
    while ($datachapters = $chapters->fetch()) {
    
        echo '<p><strong>' . htmlspecialchars($datachapters['title_chapter']) . '</strong> le ' . $datachapters['date_chapter_fr'] . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($datachapters['text_chapter'])) . '</p>';
        echo '<p><a href="index.php?id_chapter='. $datachapters['id_chapter'] . '">Détails et Commentaires</a></em>';
    
    }
    ?>
</body>

</html>