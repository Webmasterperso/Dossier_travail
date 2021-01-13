<?php

// Chargement des classes
require_once('model/Modelchapter.php');
require_once('model/Modelcomment.php');


function listchapter()
{
  $modelchapters = new Modelchapter(); // Création d'un objet
  $chapters = $modelchapters->readlistchapters(); // Appel d'une fonction de cet objet

  require('view/Viewlistchapter.php');
}

function onechapter()
{
  $modelchapter = new Modelchapter();
  $modelcomment = new Modelcomment();
  $datachapter = $modelchapter->readonechapter($_GET['id_chapter']);
  $commentonechapter = $modelcomment->readcommentonechapter($_GET['id_chapter']);


  require('view/Viewonechapter.php');
}

//function addComment($postId, $author, $comment)
//{
//    $commentManager = new CommentManager();

  //  $affectedLines = $commentManager->postComment($postId, $author, $comment);

    //if ($affectedLines === false) {
      //  throw new Exception('Impossible d\'ajouter le commentaire !');
    //} else {
       // header('Location: index.php?action=post&id=' . $postId);
   // }
//}
