<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
    // notes du prof php framework
    require_once("action/AdminAction.php");   
    $action = new AdminAction();
    $action->setRedirect("login");
    $action->execute();   
    require_once("partial/header.php");
?>
<div class="contentcontainer">

    <a class="btn btn-primary btn-xl" href="?logout">LOGOUT</a>
    <br>
    <h3>ADMIN STATS</h3>
    <?php 
    echo isset($_SESSION['adminstats'])  && !empty($_SESSION['adminstats']) ? $_SESSION['adminstats'] : '';
    $_SESSION['adminstats']=''; 
    ?>
    <p>
    <b>
    <h3>ERRORS</h3>
    <?php 
    echo isset($_SESSION['error']) && !empty($_SESSION['error']) ? $_SESSION['error'] : ''; 
    $_SESSION['error'] = ''; 
    ?>
    </b>
    </p>
    <h2>Add Project</h2>
    
    <form action="admin.php" name="projectadd" id="projectadd" method="post" enctype="multipart/form-data">
        <label for="project_image">project_image</label>
        <br>
        <input type="file" name="project_image" id="project_image" accept="image/*">
        <br>
        <label for="project_name">project_name</label>
        <br>
        <input type="text" name="project_name" id="project_name">
        <br>
        <label for="project_technologies">project_technologies</label>
        <br>
        <textarea name="project_technologies" id="project_technologies" class="tinymcetext" cols="30" rows="10"></textarea>
        <br>
        <label for="project_description">project_description</label>
        <br>
        <textarea name="project_description" id="project_description" class="tinymcetext" cols="30" rows="10"></textarea>
        <br>
        <label for="project_lang">project_lang</label>
        <br>
        <input type="radio" id="contactChoice1" name="project_lang" value="en" checked>
        <label for="contactChoice1">en</label>

        <input type="radio" id="contactChoice2" name="project_lang" value="fr">
        <label for="contactChoice2">fr</label>
        <br>  
        <input type="submit" value="Send data">
    </form>  


    <h2>Change site description</h2>

    <form action="admin.php" name="contentchange" id="contentchange" method="post">
        <label for="content_title">content_title</label>
        <br>
        <input type="text" name="content_title" id="content_title">
        <br>

        <label for="content_description_1">content_description_1</label>
        <br>
        <textarea name="content_description_1" id="content_description_1" class="tinymcetext" cols="30" rows="10"></textarea>
        <br>

        <label for="content_description_2">content_description_2</label>
        <br>
        <textarea name="content_description_2" id="content_description_2" class="tinymcetext" cols="30" rows="10"></textarea>
        <br>

        <label for="content_lang">content_lang</label>
        <br>
        <input type="radio" id="contactChoice1" name="content_lang" value="en" checked>
        <label for="contactChoice1">en</label>

        <input type="radio" id="contactChoice2" name="content_lang" value="fr">
        <label for="contactChoice2">fr</label>
        <br>  
        <input type="submit" value="Send data">
    </form>  

    <h2>Send Token</h2>
    <form action="admin.php" name="tokensender" id="tokensender" method="post">
        <label for="tokenrequesemail">tokenrequesemail</label>
        <br>
        <input type="text" name="tokenrequesemail" id="tokenrequesemail">
        <br>  
        <input type="submit" value="Send token">
    </form> 
</div>
<?php
    require_once("partial/footer.php");