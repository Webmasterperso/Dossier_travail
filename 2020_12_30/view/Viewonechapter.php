<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Mon super blog !</h1>
    <p><a href="../index.php">Retour à la liste des chapitre</a></p>

    <div class="chapter">
        <h3>
            <?= htmlspecialchars($datachapter['title_chapter']) ?>
            <em>le <?= $datachapter['date_chapter_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($datachapter['text_chapter'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <?
    while ($datacomments = $comment->fetch()) {
    
        echo '<p><strong>' . htmlspecialchars($datacomments['author_comment']) . '</strong> le ' . $datacomments['date_comment_fr'] . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($datacomments['text_comment'])) . '</p>';
    }
    ?>

</body>

</html>