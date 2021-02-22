<?php
if (!isset($_SESSION['user'])) {
?>


    <article id="biographie">
        <h3>Votre Guide</h3>
        <div id="textbio">
            <p id="illustration"><img src="view/media/forteroche.jpg" alt="photo" id="photo" /></p>
            <p id="text">
                Jean Rocheforte est né en 1971 en France dans la région du Centre.
                Ses parents, commerçants artisans, lui ont donné le goût de l'effort
                et d'une vie simple.
                Alors que son père effectue son service militaire au Sénégal. Revenu en France, il grandit dans la ferme qu'exploite son grand-père en région de Sologne.</br>
                Suivant les traces de son aïeul, il entreprend des études au lycée agricole de Montargis, puis à l'ISTOM, l'école supérieure d'agro-développement international.>/br>
                Son diplôme en poche, Nicolas Vanier entreprend sa toute première expédition à 20 ans, en traversant à pied la Laponie.
                Ce premier périple ne fait qu'attiser sa soif d'aventures. En 1984, il part à l'assaut du grand nord canadien avec deux coureurs des bois et leur attelage de chiens de traîneaux. Le jeune baroudeur de 21 ans fait alors ses premiers pas de réalisateur en tournant le documentaire Coureurs des bois.
            </p>
        </div>
    </article>


<?php } ?>



<section id=listchapter>

    <h2>Liste des chapitres</h2>
    <p>En date du
        <?php
        $datefr = date("d-m-Y");
        echo $datefr;
        ?>
    </p>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<p><a href="index.php?action=nouveau">Ajouter un chapitre</a></p>';
    }
    ?>

    <?php
    while ($datachapters = $chapters->fetch()) {
        echo '<div class="onechap">';
        echo '<p><strong>' . htmlspecialchars($datachapters['title_chapter']) . '</strong> le ' . $datachapters['date_chapter_fr'] . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($datachapters['text_chapter'])) . '</p>';
        echo '<p><a href="index.php?id_chapter=' . $datachapters['id_chapter'] . '">Détails et Commentaires</a></em>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="index.php?id_chapter=' . $datachapters['id_chapter'] . '&action=modifier">modifier le chapitre</a></p>';
        }
        echo '</div>';
    }

    ?>

</section>