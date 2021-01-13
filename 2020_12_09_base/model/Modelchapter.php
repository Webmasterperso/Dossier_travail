<?php

//$db=mysql_connect("votredomaine.com.mysql", "nom d'utilisateur", "mot de passe");
//mysql_select_db("base de données", $db);

//$db = mysql_connect('webmasterperso.fr.mysql', 'webmasterperso_', 'webmaster2579');
//mysql_select_db('webmasterperso_',$db);
?>

<?php
class Modelchapter
{
    public function readlistchapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_chapter, title_chapter, author_chapter, DATE_FORMAT(date_chapter, \'%d/%m/%Y\') AS date_chapter_fr FROM chapter ORDER BY id_chapter DESC LIMIT 0, 10');

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

    public function savechapter()
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('INSERT INTO chapter(title_chapter, text_chapter, date_chapter) VALUES(?, ?, NOW())');
        $affectedLines = $chapter->execute(array($chaptertitle, $chaptertext));
        
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
