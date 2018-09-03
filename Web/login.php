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
    <h1 class="titlecenter">ADMIN LOGIN</h1>
    <form class="formLogin" action="login.php" method="post">
        <label for="user">USERNAME : </label>
        <input type="text" name="user" id="username">
        <br>
        <label for="password">PASSWORD : </label>
        <input type="password" name="pwd" id="password">
        <br>
        <input type="submit" value="Login">
    </form>
</div>