<?php
require('controleur/Controlchapter.php');
echo 'publisher = ' . $_POST['public'] . '</br>';

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
?>
