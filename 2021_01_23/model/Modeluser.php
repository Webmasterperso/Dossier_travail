<?php
require_once("model/Manager.php");

class Modeluser extends Manager
{
    public function readoneuser($pseudouser, $passworduser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_user, pseudo_user, password_user, email_user, role_user, nbr_comments_user FROM user WHERE pseudo_user = ? AND password_user = ?');
        $req->execute(array($pseudouser, $passworduser));
        $datauser = $req->fetch();

        return $datauser;
    }
}