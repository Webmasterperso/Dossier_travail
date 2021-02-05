<section id='onechapter'>
    <section id='chapter'>
        <p><a href="index.php"> /<< Retour à la liste des chapitres</a>
        </p>
        <h1>Billet simple pour l'Alaska par chapitre!</h1>

        <div class="listchapter">
            <h3>
                <?= htmlspecialchars($datachapter['title_chapter']) ?>
                <em>le <?= $datachapter['date_chapter_fr'] ?></em>
            </h3>

            <p>
                <?= nl2br(html_entity_decode(htmlspecialchars($datachapter['text_chapter']))) ?>
            </p>
        </div>
    </section>

    <section id='comments'>
        <h2>Commentaires</h2>
        <section id='comment'>
            <?
            while ($datacomments = $commentonechapter->fetch()) {
           ?>
            <div class="onecomment">
                <p><strong><?= htmlspecialchars($datacomments['author_comment']); ?> </strong> le <?= $datacomments['date_comment_fr'] ?></p>
                <p><?= nl2br(html_entity_decode(htmlspecialchars($datacomments['text_comment']))); ?> :) </p>
            </div>
            <? }
            ?>
        </section>
        <section id='newcomments'>


            <form action="index.php?id_chapter=<?= $_GET['id_chapter'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="textcomment">Commentaire</label><br />
                    <textarea id="textcomment" name="textcomment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </section>
    </section>



</section>

<?php //html_entity_decode($post['content']) ?>