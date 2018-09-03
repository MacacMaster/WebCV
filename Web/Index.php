<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
    // notes du prof php framework
   	require_once("action/IndexAction.php");   
    $action = new IndexAction();
    $action->execute();   
    $index = $action->getText();  
    $portfolio = $action->getProjects(); 
    require_once("partial/header.php");
?>
<!-- Header -->
<header class="masthead bg-primary text-white text-center" id="me">
    <div class="container">
    <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
    <h1 class="text-uppercase mb-0">Marc-André Ramsay</h1>
    <h2 class="font-weight-light mb-0"><?= $index['content_title'] ?></h2> 
    </div>
</header>

    <!-- About Section -->
    <section class="bg-dark text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white"><?= $index['content_about'] ?></h2>
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead"><?= $index['content_description_1'] ?></p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead"><?= $index['content_description_2'] ?></p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="cv.php">
            <i class="fa fa-file-text-o mr-2"></i>
            <?= $index['content_readcv'] ?>
          </a>
        </div>
      </div>
    </section>

<!-- Portfolio Grid Section -->
<section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0"><?= $index['content_myprojects'] ?></h2>
        <br>
        <div class="row">
        <?php 
          // for each in array of portfolio
          foreach($portfolio as &$portf)
          {
          ?>
            <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-<?= $portf['id']; ?>">
                <div class="portfolio-item-caption d-flex  position-absolute h-100 w-100">
                    <div class="portfolio-item-caption-content w-100 my-auto text-center text-white">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <img class="img-fluid img-portfolio" src=<?=$portf['project_image'];?> alt="">
            </a>
            </div>
          <?php 
          }
        ?>
        </div>
      </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0"><?= $index['content_contactme'] ?></h2>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Name</label>
                  <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label><?= $index['content_form_email'] ?></label>
                  <input class="form-control" id="email" type="email" placeholder="<?= $index['content_form_email'] ?>" required="required" data-validation-required-message="<?= $index['content_form_email_error'] ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="<?= $index['content_form_message_error'] ?>"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <img src="img/captcha.gif" alt="captcha">
                  <label>Captcha</label>
                  <input class="form-control" id="captcha" type="text" placeholder="Captcha" required="required" data-validation-required-message="<?= $index['content_form_captcha_error'] ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton"><i class="fa fa-paper-plane"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<!-- Portfolio Modal -->
<?php   // for each in array of portfolio
  foreach($portfolio as &$portf)  {  ?>
<div class="portfolio-modal mfp-hide" id="portfolio-modal-<?= $portf['id']; ?>">
  <div class="portfolio-modal-dialog bg-white">
    <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
      <i class="fa fa-3x fa-times"></i>
    </a>
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-secondary text-uppercase mb-0"><?= $portf['project_name'] ?></h2>
          <hr class="star-dark mb-5">
          <img class="img-fluid mb-5 img-portfolio" src=<?= $portf['project_image'] ?> alt="">
          <p class="mb-5"><b><?= $portf['project_technologies'] ?></b></p>
          <p class="mb-5"><?= $portf['project_description'] ?></p>
          <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
            <i class="fa fa-close"></i>
            <?= $index['content_close'] ?></a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  } 
  require_once("partial/footer.php");