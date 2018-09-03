<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
    session_start();
    // Toggles language
    echo  $_SESSION['lang'];
    $_SESSION['lang'] = $_SESSION['lang']==='fr' ? 'en' : 'fr';
    echo  $_SESSION['lang'];
    header('Location: ../index.php');
?>