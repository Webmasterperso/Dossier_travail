<?php
session_start();
require('view/Viewhead.php');
require('controleur/Control.php');

//echo 'publisher = ' . $_POST['public'] . '</br>';
//echo 'chatper = ' . $_GET['id_chapter'] . ' / ' . $_POST['titlechapter'] . ' / ' . $_POST['textchapter'] . ' - ' . $_POST['Enregistrer'] .'</br>';


if ($_GET['action'] == 'connection') {
    if (isset($_POST['user']) && isset($_POST['password'])) {
    //echo 'user : ' . $user . ' / passeword : ' . $password . '</br>';
    //echo 'lancement formulaire </br>';
        user();
    }
    else {
       
        require('view/Viewuser.php');
    }
}

if ($_GET['action'] == 'deconnect') {
    //echo 'Fin de session';

    userout();
}



if (isset($_SESSION['user'])) {
    echo '<p>Bonjour ' . $_SESSION['user'] . ' - ';
    echo '<a href="index.php?action=deconnect">Deconnexion</a></p>';


    if (isset($_POST['textchapter']) && isset($_POST['Enregistrer'])) {
        //echo 'bonjour postnouveauchap';
        newchapter();
    } elseif (isset($_POST['textchapter']) && isset($_POST['Modifier'])) {
        //echo 'bonjour postmodifchap';
        savemoditchapter();
    } elseif ($_GET['action'] === 'modifier') {
        //echo 'bonjour affichemodifchap';
        modifchapter();
    } elseif ($_GET['action'] === 'nouveau') {
        //echo 'bonjour affichemodifchap';
        require('view/Vieweditchapter.php');
    } elseif ($_GET['action'] === 'connection') {
        //echo 'bonjour affichemodifchap';
        listchapter();
        listcomment();
    }
}

if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0) {
    //echo 'bonjour get ' . $_GET['id_chapter'];
    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
        echo 'bonjour post ' . $_GET['id_chapter'];
        addComment();
    }
    onechapter();
} else {
    if (isset($_POST['public'])) {
        if (isset($_POST['supprimer'])) {
            //echo 'bonjour postdeletecomment';
            suppComment();
        }
        else {
            //echo 'bonjour postpublishcomment';
            changepubliserComment();
        }
    }
    if($_GET['action'] <> 'nouveau' && $_GET['action'] <> 'connection') {
    listchapter();
        if (isset($_SESSION['user'])) {
        listcomment();
        }
    }
}

require('view/Viewfooter.php');
