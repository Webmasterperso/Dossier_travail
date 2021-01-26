<?php
session_start();
require('controleur/Control.php');

//echo 'publisher = ' . $_POST['public'] . '</br>';
//echo 'chatper = ' . $_GET['id_chapter'] . ' / ' . $_POST['titlechapter'] . ' / ' . $_POST['textchapter'] . ' - ' . $_POST['Enregistrer'] .'</br>';


if (isset($_POST['user']) && isset($_POST['password'])) {
    //echo 'user : ' . $user . ' / passeword : ' . $password . '</br>';
    echo 'lancement formulaire </br>';
    user();
}
if ($_GET['action'] == 'deconnect') {
    echo 'Fin de session';

    userout();
}

if (isset($_SESSION['user'])) {
    echo 'Bonjour ' . $_SESSION['user'] . ' </br>';
    echo '<p><a href="index.php?action=deconnect">Deconnexion</a></p>';


    if (isset($_POST['textchapter']) && isset($_POST['Enregistrer'])) {
        echo 'bonjour postnouveauchap';
        newchapter();
    } elseif (isset($_POST['textchapter']) && isset($_POST['Modifier'])) {
        echo 'bonjour postmodifchap';

        savemoditchapter();
    } elseif ($_GET['action'] === 'modifier') {
        echo 'bonjour affichemodifchap';

        modifchapter();
    }
}

if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0) {
    echo 'bonjour get ' . $_GET['id_chapter'];
    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
        echo 'bonjour post ' . $_GET['id_chapter'];
        addComment();
    }

    onechapter();
} else {
    if (isset($_POST['public'])) {
        if(isset($_POST['supprimer'])) {
            echo 'bonjour postdeletecomment';
            suppComment();
        }
        else {
            echo 'bonjour postpublishcomment';
            changepubliserComment();
        }
        
    }
    echo 'bonjour index';
    listchapter();
    if (isset($_SESSION['user'])) {
    listcomment();
    }
}
