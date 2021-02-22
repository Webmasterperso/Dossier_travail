<?php
session_start();
require('controleur/Control.php');

if (isset($_SESSION['user'])) {
    require('view/Viewheadadmin.php');
} else {
    require('view/Viewhead.php');
}


if ($_GET['action'] == 'connection' or $_GET['action'] == 'identification') {
    if (isset($_POST['user']) && isset($_POST['password'])) {
        if (!isset($_SESSION['user'])) {
            //header("Refresh: 0;url=view/Viewheadadmin.php");
            user();
        } else {
            usermodif();
        }
    } else {
        require('view/Viewuser.php');
    }
}
if ($_GET['action'] == 'deconnect') {
    userout();
}


if (isset($_SESSION['user'])) {

    if (isset($_POST['textchapter']) && isset($_POST['Enregistrer'])) {
        newchapter();
    } elseif (isset($_POST['textchapter']) && isset($_POST['Modifier'])) {
        savemodifchapter();
    } elseif (isset($_POST['textchapter']) && isset($_POST['Publier'])) {
        savepublichapter();
    } elseif ($_GET['action'] === 'modifier') {
        modifchapter();
    } elseif ($_GET['action'] === 'nouveau') {
        require('view/Vieweditchapter.php');
    } elseif ($_GET['action'] === 'connection') {
        listchapter();
        listcomment();
    }
}


if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0 && !isset($_POST['public'])) {

    if (!empty($_POST['author']) && !empty($_POST['textcomment'])) {
        addComment();
    }
    onechapter();
} else {
    if (isset($_POST['public'])) {
        if (isset($_POST['supprimer'])) {
            suppComment();
        } else {
            changepublierComment();
        }
    }
    if ($_GET['action'] <> 'nouveau' && $_GET['action'] <> 'connection' && $_GET['action'] <> 'identification') {
        if (isset($_SESSION['user'])) {
            listchapter();
            listcomment();
        } elseif (isset($_POST['public'])) {
            onechapter();
        } else {
            echo 'listchapterpubli';
            listchapterpubli();
        }
    }
}

require('view/Viewfooter.php');
