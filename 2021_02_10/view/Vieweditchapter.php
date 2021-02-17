<section id = 'editchapter'>
    <h2>Billet simple pour l'Alaska - gestion des chapitre</h2>
    <form action="index.php?id_chapter=<?= $_GET['id_chapter'] ?>" method="post">
        <div>
            <label for="titlechapter">Titre du chapitre</label><br />
            <input type="text" id="titlechapter" name="titlechapter" value="<?= htmlspecialchars($datachapter['title_chapter']); ?>" />
        </div>
        <div>
            <label for="textchapter">Texte</label><br />
            <textarea id="textchapter" name="textchapter" cols="1000" rows="100"><? echo nl2br(htmlspecialchars($datachapter['text_chapter'])); ?></textarea>
        </div>
        <div>
            <?php
            if (isset($_GET['id_chapter'])) {
                echo '<input type="submit" name="Modifier" value="modifier" />';
                echo '<input type="submit" name="Publier" value="publier" />';
            } else {
                echo '<input type="submit" name="Enregistrer" value="enregistrer" />';
            }
            ?>
            
        </div>
    </form>
</section>

