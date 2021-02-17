<?php
require_once("model/Manager.php");

class Modelcomment extends Manager
{
    public function readlistcomments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_comment, id_fromchapter, author_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, text_comment, etat_comment FROM comments ORDER BY id_comment DESC LIMIT 0, 100');

        return $req;
    }

    public function readcommentonechapter($chapterId)
    {
        $db = $this->dbConnect();
        $commentonechapter = $db->prepare('SELECT id_comment, id_fromchapter, author_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, text_comment, etat_comment FROM comments WHERE id_fromchapter = ? AND etat_comment = 1');
        $commentonechapter->execute(array($chapterId));
        
        return $commentonechapter;
    }

    public function savecomment($chapteridcomment, $authorcomment, $textcomment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_fromchapter, author_comment, text_comment, date_comment) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapteridcomment, $authorcomment, $textcomment));

        return $affectedLines;
    }

    public function deletecomment($chapteridcomment)
    {
        $db = $this->dbConnect();
        $deletecomments = $db->prepare('DELETE FROM comments WHERE id_comment = ?');
        $deleteLines = $deletecomments->execute(array($chapteridcomment));
        return $deleteLines;

        
    }

    public function publishedcomment($etatcomment, $idcomment)
    {
        $db = $this->dbConnect();
        $publishcomment = $db->prepare('UPDATE comments SET etat_comment=? WHERE id_comment=?');
        $updateLines = $publishcomment->execute(array($etatcomment, $idcomment));

        return $updateLines;
    }

    
}
