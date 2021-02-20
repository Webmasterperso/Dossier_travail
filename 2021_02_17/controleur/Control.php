<?php

// Chargement des classes
require_once('model/Modelchapter.php');
require_once('model/Modelcomment.php');
require_once('model/Modeluser.php');

function usermodif()
{
  // Hachage du mot de passe
  if(isset($_POST['password']) && isset($_POST['user']))
  {
    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = $_POST['user'];
   
    $iduser = $_SESSION['iduser'];
  
    //$iduser = '2';
    $modeluser = new Modeluser();
    $affectedLinesuser = $modeluser->modifuser($user, $pass_hache, $iduser);
  }
  else
  {
    Echo'Un identifiant et un mot de passe sont obligatoires, aucun changement n\'a été effectué';
  }
  
}


function user()
{
  
  $user = htmlspecialchars($_POST['user']);
  //Comparaison du pass envoyé via le formulaire avec la base
  $mdp = $_POST['password'];

  $modeluser = new Modeluser();
  $datauser = $modeluser->readoneuser($user);
  //Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = password_verify($mdp, $datauser['password_user']);
  echo 'user : ' . $user . ' - MdPin : ' . $mdp . ' - MdP base : ' . $datauser["password_user"] . '</br>' ;
  echo ' - comparaison MdP : ' . password_verify($mdp, $datauser['password_user']) . '</br>';

  if (!$datauser) {
    echo 'Mauvais identifiant , vous ne pouvez pas vous connecter !';
    echo 'comparaison MdP : '. $isPasswordCorrect;
    require('view/Viewuser.php');
  } else {
    if ($isPasswordCorrect) {
      $_SESSION['user'] = $user;
      $_SESSION['iduser'] = $datauser['id_user'];
        
    } else {
      echo 'Vous nêtes pas connecté, votre mot de passe est incorrecte...';
      echo ' - comparaison MdP : ' . $isPasswordCorrect;
      require('view/Viewuser.php');
    }
  }
}


function userout()

{

  $_SESSION = array();
  // Destruction de la session
  session_destroy();
  // Destruction du tableau de session
  unset($_SESSION);
}


function listchapter()
{
  $modelchapters = new Modelchapter(); // Création d'un objet
  $chapters = $modelchapters->readlistchapters(); // Appel d'une fonction de cet objet

  require('view/Viewlistchapter.php');
}

function listchapterpubli()
{
  $modelchapters = new Modelchapter(); // Création d'un objet
  $chapters = $modelchapters->readlistchapterspubli(); // Appel d'une fonction de cet objet

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
  //$datachapter = $modelchapter->publicationchapter($_GET['id_chapter']);


  require('view/Vieweditchapter.php');
}

function savemodifchapter()
{
  $modelchapter = new Modelchapter();
  $datachapter = $modelchapter->savechapter($_POST['titlechapter'], $_POST['textchapter'], $_GET['id_chapter']);
}

function savepublichapter()
{
  $modelchapter = new Modelchapter();
  $datachapter = $modelchapter->publicationchapter($_POST['titlechapter'], $_POST['textchapter'], $_GET['id_chapter']);
}



function newchapter()
{
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

  $affectedLines = $modelcomment->savecomment($_GET['id_chapter'], $_POST['author'], $_POST['textcomment']);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  } else {
    //header('Location: index.php?id=' . $_GET['id_chapter']);
  }
}

function suppComment()
{
  $modelcomment = new Modelcomment();
  $deleteLines = $modelcomment->deletecomment($_GET['id']);
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
