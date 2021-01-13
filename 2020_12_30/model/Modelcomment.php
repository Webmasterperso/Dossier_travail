<?php
class Modelcomment
{
    public function readlistcomments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_comment, id_fromchapter, author_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, text_comment, etat_comment FROM comments ORDER BY id_comment DESC LIMIT 0, 10');

        return $req;
    }

    public function readcommentonechapter($commentchapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_comment, id_fromchapter, author_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, text_comment, etat_comment FROM comments WHERE id_fromchapter = ?');
        $req->execute(array($commentchapterId));
        $datacomment = $req->fetch();

        return $datacomment;
    }

    public function addcomment($commentchapterId, $author, $textcomment)
    {
        $db = $this->dbConnect();
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
