<?php
require('controleur/Controlchapter.php');
echo 'publisher = ' . $_POST['public'] . '</br>';
echo 'newchapter = ' . $_POST['titlechapter'] . ' - ' . $_POST['Enregistrer'] .'</br>';

if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0) {
    echo 'bonjour get ' . $_GET['id_chapter'];
    if(!empty($_POST['author']) && !empty($_POST['comment'])) {
        echo 'bonjour post ' . $_GET['id_chapter'];
        addComment();
    }
    
    onechapter();
}
else {
    if (isset($_POST['public'])) {
        echo 'bonjour postpublish';
        changepubliserComment();
    }    
    echo 'bonjour index';
    listchapter();
    listcomment();
}

if(isset($_POST['textchapter']) && isset($_POST['Enregistrer'])) {
    echo 'bonjour postnouveauchap';
    newchapter();
}
else {

    modifchapter();
}


?>
