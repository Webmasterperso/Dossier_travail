

<section id='listcomment'>
    <h1>Billet simple pour l'Alaska</h1>

    <h2>Liste des commentaires</h2>
    <p>En date du
        <?php
        $datefr = date("d-m-Y");
        echo $datefr;
        ?></p>

    <table>
        <tr>
            <th>Date</th>
            <th>ID</th>
            <th>Chap</th>
            <th>Pseudo</th>
            <th>Commentaire</th>
            <th>Publié</th>
            <th>Action</th>
        </tr>

        <?php
        while ($datacomments = $comments->fetch()) {
            echo '<tr>' .
                '<td>' . htmlspecialchars($datacomments['date_comment_fr']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['id_comment']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['id_fromchapter']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['author_comment']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['text_comment']) . '</td>';

            //echo 'Etat chargement : ' . $datacomments['etat_comment'];
            if ($datacomments['etat_comment'] === '1') {
                //echo 'Etat publié : ' . $datacomments['etat_comment'];

                echo '<td><input type="checkbox" id="published" name="published" disabled="disabled" checked></td>';
                echo '<td> <form action="index.php?id=' . $datacomments['id_comment'] . '" method="post">';
                echo '<input type="hidden" id="public" name="public" value="2" />';
                echo '<input type="submit" value="Bloquez" /></form></td>';
            } else {
                //echo 'Etat non publié : ' . $datacomments['etat_comment'];

                echo '<td><input type="checkbox" id="published" name="published" disabled="disabled"></td>';
                echo '<td> <form action="index.php?id=' . $datacomments['id_comment'] . '" method="post">';
                echo '<input type="hidden" id="public" name="public" value="1" />';
                echo '<input type="submit" nama="publier" value="Publier"/>';
                echo '<input type="submit" name="supprimer" value="Supprimer"/></form></td>';
            }



            echo '</tr>';
        }

        ?>
    </table>


</section>