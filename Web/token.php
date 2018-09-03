<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
    // notes du prof php framework
   	require_once("action/LoginAction.php");   
    $action = new LoginAction();
    $action->execute();   
    require_once("partial/header.php");
?>
<div class="contentcontainer">
    <h1 class="titlecenter">CV</h1>
    <p>You need to be connected with your token to view my CV</p>
    <p>Vous devez entrer votre token pour visionner mon CV</p>
    <form class="formLogin" action="token.php" method="post">
        <label for="token">TOKEN : </label>
        <input type="text" name="token" id="username">
    
        <input type="submit" value="Token">
    </form>
</div>