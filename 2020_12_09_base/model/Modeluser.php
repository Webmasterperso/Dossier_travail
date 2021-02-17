<?php
require_once("model/Manager.php");

class Modeluser extends Manager
{
    public function readoneuser($pseudouser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_user, pseudo_user, password_user FROM user WHERE pseudo_user = ?');
        $req->execute(array($pseudouser));
        $datauser = $req->fetch();

        return $datauser;
    }

    public function saveuser($pseudouser, $passworduser)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO user(pseudo_user, password_user) VALUES(?, ?)');
        $affectedLinesuser = $user->execute(array($pseudouser, $passworduser));

        return $affectedLinesuser;
    }

    public function modifuser($pseudouser, $passworduser, $iduser)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('UPDATE user SET pseudo_user=?, password_user=? WHERE id_user=?');
        $affectedLinesuser = $user->execute(array($pseudouser, $passworduser, $iduser));

        return $affectedLinesuser;
    }


}