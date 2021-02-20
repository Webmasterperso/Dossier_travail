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
        //echo 'user : ' . $user . ' / passeword : ' . $password . '</br>';
        //echo 'lancement formulaire </br>';
        if (!isset($_SESSION['user'])) {
            //header("Refresh: 0;url=view/Viewheadadmin.php");
            user();
        } else {
            echo 'Modif admin';
            usermodif();
        }
    } else {

        echo 'pas user - postsubmit : ' . $_POST['send'];
        require('view/Viewuser.php');
    }
}

if ($_GET['action'] == 'deconnect') {
    //echo 'Fin de session';

    userout();
}






if (isset($_SESSION['user'])) {
    


    if (isset($_POST['textchapter']) && isset($_POST['Enregistrer'])) {
        //echo 'bonjour postnouveauchap';
        newchapter();
    } elseif (isset($_POST['textchapter']) && isset($_POST['Modifier'])) {
        //echo 'bonjour postmodifchap';
        savemodifchapter();
    } elseif (isset($_POST['textchapter']) && isset($_POST['Publier'])) {
        //echo 'bonjour postmodifchap';
        savepublichapter();
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
    } //elseif ($_GET['action'] === 'connection' && isset($_POST['send'])) {
        //echo'Modif admin';
        //usermodif();
    //}

}

if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0)
{
    echo 'bonjour get ' . $_GET['id_chapter'];
    if (!empty($_POST['author']) && !empty($_POST['textcomment'])) {
        echo 'bonjour post ' . $_GET['id_chapter'];
        addComment();
    }
    onechapter();
}
else {
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
    if($_GET['action'] <> 'nouveau' && $_GET['action'] <> 'connection'&& $_GET['action'] <> 'identification')
    {
    
        if (isset($_SESSION['user'])) {
        listchapter();
        listcomment();
        }
        else {
            listchapterpubli();
        }
    }
}

require('view/Viewfooter.php');
