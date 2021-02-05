<section id="page">

    <section id="articles">
        <article id="biographie">
            <h3>Votre Guide</h3>
            <p>
                Jean Rocheforte est né en 1971 en France dans la région des Landes.
                Ses parents, commerçants artisans, lui ont donné le goût de l'effort
                et d'une vie simple.
            </p>
        </article>
    </section>

</section>

<section id=listchapter>

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
        echo '<p><a href="index.php?id_chapter=' . $datachapters['id_chapter'] . '">Détails et Commentaires</a></em>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="index.php?id_chapter=' . $datachapters['id_chapter'] . '&action=modifier">modifier le chapitre</a></p>';
        }
    }

    if (isset($_SESSION['user'])) {
        echo '<p><a href="index.php?action=nouveau">Ajouter un chapitre</a></p>';
    }
    ?>
    

</section>