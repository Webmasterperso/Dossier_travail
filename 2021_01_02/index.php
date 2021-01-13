<?php
require('controleur/Controlchapter.php');
if (isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0) {
    echo 'bonjour' . $_GET['id_chapter'];
    onechapter();
}
else {
    listchapter();
}
