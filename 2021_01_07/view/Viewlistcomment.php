<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
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
        </tr>

        <?php
        while ($datacomments = $comments->fetch()) {
            echo '<tr>' .
                '<td>' . htmlspecialchars($datacomments['date_comment_fr']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['id_comment']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['id_fromchapter']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['author_comment']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['text_comment']) . '</td>' .
                '<td>' . htmlspecialchars($datacomments['etat_comment']) . '</td>';
            //'<td> <input type="checkbox" id="published" name="published" value=" '.  htmlspecialchars($datacomments['etat_comment']) .
            if ($datacomments['etat_comment'] != "1") {
                echo '<td> <input type="checkbox" id="published" name="published" valeur="2"></td>';
            }
            else {
                echo '<td> <input type="checkbox" id="published" name="published" valeur="2" checked></td>';
            }

            echo '</tr>';
        }

        ?>
    </table>


</body>

</html>