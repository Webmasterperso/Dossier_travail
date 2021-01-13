<?php
class Modelcomment
{
    public function readlistcomments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_comment, id_fromchapter, author_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, text_comment, etat_comment FROM comments ORDER BY id_comment DESC LIMIT 0, 10');

        return $req;
    }

    public function readcommentonechapter($chapterId)
    {
        $db = $this->dbConnect();
        $commentonechapter = $db->prepare('SELECT id_comment, id_fromchapter, author_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, text_comment, etat_comment FROM comments WHERE id_fromchapter = ?');
        $commentonechapter->execute(array($chapterId));
        //$datacomment = $req->fetch();

        return $commentonechapter;
    }

    public function savecomment($chapteridcomment, $authorcomment, $textcomment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_fromchapter, author_comment, text_comment, date_comment) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapteridcomment, $authorcomment, $textcomment));

        return $affectedLines;
    }

    function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=webmasterperso.fr.mysql;dbname=webmasterperso_;charset=utf8', 'webmasterperso_', 'webmaster2579');
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
