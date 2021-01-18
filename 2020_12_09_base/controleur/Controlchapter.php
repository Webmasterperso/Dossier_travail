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

function listcomment()
{
$modelcomments = new Modelcomment();
$comments = $modelcomments->readlistcomments();
  require('view/Viewlistcomment.php');
}

function onechapter()
{
  $modelchapter = new Modelchapter();
  $modelcomment = new Modelcomment();
  $datachapter = $modelchapter->readonechapter($_GET['id_chapter']);
  $commentonechapter = $modelcomment->readcommentonechapter($_GET['id_chapter']);
  require('view/Viewonechapter.php');
}

function modifchapter()
{
  $modelchapter = new Modelchapter();
  
  $datachapter = $modelchapter->readonechapter($_GET['id_chapter']);

  require('view/Vieweditchapter.php');
}


function newchapter(){
  $modelnewchapter = new Modelchapter();
  $affectedLinesnewchapter = $modelnewchapter->savenewchapter($_POST['titlechapter'], $_POST['textchapter']);

  if ($affectedLinesnewchapter === false) {
    throw new Exception('Impossible d\'ajouter un nouveau chapitre !');
  } else {
    //header('Location: index.php?id=' . $_GET['id_chapter']);
  }
  require('view/Vieweditchapter.php');
}

function addComment()
{
   $modelcomment = new Modelcomment();

    $affectedLines = $modelcomment->savecomment($_GET['id_chapter'],$_POST['author'], $_POST['comment']);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        //header('Location: index.php?id=' . $_GET['id_chapter']);
    }
}

function changepubliserComment()
{
  $modelcomment = new Modelcomment();
  
  if (isset($_POST['public'])) {
    $publish = $_POST['public'];
  }
    
  $updateLines = $modelcomment->publishedcomment($publish, $_GET['id']);

  if ($updateLines === false) {
    throw new Exception('Impossible de changer la publication du commentaire !');
  } else {
    //header('Location: index.php?id=' . $_GET['id_chapter']);
  }
}
