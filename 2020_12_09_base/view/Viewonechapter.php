<?php //ob_start(); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Billet simple pour l'Alaska par chapitre!</h1>
    <p><a href="index.php">Retour à la liste des chapitres</a></p>

    <div class="chapter">
        <h3>
            <?= htmlspecialchars($datachapter['title_chapter']) ?>
            <em>le <?= $datachapter['date_chapter_fr'] ?></em>
        </h3>

        <p>
             <?= nl2br(htmlspecialchars($datachapter['text_chapter']))?>
        </p>
    </div>



    <h2>Commentaires</h2>

    <form action="index.php?id_chapter=<?= $_GET['id_chapter'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

    <?
    while ($datacomments = $commentonechapter->fetch()) {
        echo '_______________________________________________________';
        echo '<p><strong>' . htmlspecialchars($datacomments['author_comment']) . '</strong> le ' . $datacomments['date_comment_fr'] . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($datacomments['text_comment'])) . '</p>';
    }
    ?>

</body>

</html>
<?php //$datacomments = ob_get_clean(); 
?>