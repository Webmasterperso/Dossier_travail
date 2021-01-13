<?php
require('controleur/Controlchapter.php');
if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0) {
    echo 'bonjour get ' . $_GET['id_chapter'];
    if(!empty($_POST['author']) && !empty($_POST['comment'])) {
        echo 'bonjour post ' . $_GET['id_chapter'];
        addComment();
    }
    onechapter();
}

else {
    echo 'bonjour ' . $_GET['id_chapter'];
    listchapter();
    listcomment();
}
