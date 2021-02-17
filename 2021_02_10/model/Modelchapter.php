<?php

//$db=mysql_connect("votredomaine.com.mysql", "nom d'utilisateur", "mot de passe");
//mysql_select_db("base de données", $db);

//$db = mysql_connect('webmasterperso.fr.mysql', 'webmasterperso_', 'webmaster2579');
//mysql_select_db('webmasterperso_',$db);
?>

<?php
require_once("model/Manager.php");

class Modelchapter extends Manager
{
    public function readlistchapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_chapter, title_chapter, author_chapter, DATE_FORMAT(date_chapter, \'%d/%m/%Y\') AS date_chapter_fr FROM chapter ORDER BY id_chapter DESC LIMIT 0, 100');

        return $req;
    }

    public function readlistchapterspubli()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_chapter, title_chapter, author_chapter, DATE_FORMAT(date_chapter, \'%d/%m/%Y\') AS date_chapter_fr, publication_chapter FROM chapter WHERE publication_chapter="2" ORDER BY id_chapter DESC LIMIT 0, 100');

        return $req;
    }

    public function readonechapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_chapter, title_chapter, text_chapter, DATE_FORMAT(date_chapter, \'%d/%m/%Y\') AS date_chapter_fr FROM chapter WHERE id_chapter = ?');
        $req->execute(array($chapterId));
        $datachapter = $req->fetch();

        return $datachapter;
    }

    public function savenewchapter($chaptertitle, $chaptertext)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('INSERT INTO chapter(title_chapter, author_chapter, text_chapter, date_chapter, publication_chapter) VALUES(?, "Jean Forteroche", ?, NOW(),"1")');
        $affectedLinesnewchapter = $chapter->execute(array($chaptertitle, $chaptertext));
        
        return $affectedLinesnewchapter;

    }

   public function savechapter($chaptertitle, $chaptertext, $chapterid)
    {
       $db = $this->dbConnect();
       $chapter = $db->prepare('UPDATE chapter SET title_chapter=?, date_chapter=NOW(), text_chapter=?, publication_chapter="1" WHERE id_chapter=?');
       $affectedLines = $chapter->execute(array($chaptertitle, $chaptertext, $chapterid));

       return $affectedLines;
    }

    public function publicationchapter($chaptertitle, $chaptertext, $chapterid)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('UPDATE chapter SET title_chapter=?, date_chapter=NOW(), text_chapter=?, publication_chapter="2" WHERE id_chapter=?');
        $affectedLines = $chapter->execute(array($chaptertitle, $chaptertext, $chapterid));

        return $affectedLines;
    }

   
}
