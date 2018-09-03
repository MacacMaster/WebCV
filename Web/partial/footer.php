    <?php 
    /* ---------------------------------------------------
    * Projet synthèse : H2018
    * Fait Par : M-A Ramsay
    *--------------------------------------------------- */
    $footer['footer_location1'] = 'Montréal';
    $footer['footer_location2'] = 'Québec, Canada';
    $footer['footer_ontheweb'] = 'Around the Web';
    $footer['footer_linkedin'] = 'https://www.linkedin.com/in/'.'ma-ramsay';
    $footer['footer_facebook'] = 'https://www.facebook.com/'.'macacmaster';
    $footer['footer_googleplus'] = 'https://plus.google.com/'.'113967888590778017280';
    // $footer['footer_twitter'] = 'https://twitter.com/'.'boby4111';
    // $footer['footer_event'] = 'https://plus.google.com/113967888590778017280';
    ?>
    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0"><?= $footer['footer_location1']; ?>
              <br><?= $footer['footer_location2']; ?></p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"><?= $footer['footer_ontheweb']; ?></h4>
            <ul class="list-inline mb-0">
            <?php if (isset($footer['footer_facebook'])){ ?>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" target="_blank" href="<?= $footer['footer_facebook']; ?>">
                  <i class="fa fa-fw fa-facebook"></i>
                </a>
              </li>
            <?php } ?>
            <?php if (isset($footer['footer_googleplus'])){ ?>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" target="_blank" href="<?= $footer['footer_googleplus']; ?>">
                  <i class="fa fa-fw fa-google-plus"></i>
                </a>
              </li>
              <?php } ?>
            <?php if (isset($footer['footer_twitter'])){ ?>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" target="_blank" href="<?= $footer['footer_twitter']; ?>">
                  <i class="fa fa-fw fa-twitter"></i>
                </a>
              </li>
              <?php } ?>
            <?php if (isset($footer['footer_linkedin'])){ ?>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" target="_blank" href="<?= $footer['footer_linkedin']; ?>">
                  <i class="fa fa-fw fa-linkedin"></i>
                </a>
              </li>
              <?php } ?>
            <?php if (isset($footer['footer_event'])){ ?>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" target="_blank" href="<?= $footer['footer_event']; ?>">
                  <i class="fa fa-fw fa-empire"></i>
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">About marcandreramsay.ca</h4>
            <p class="lead mb-0">This website uses Freelance. It is a free to use, open source Bootstrap theme created by
              <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Copyright <?= date("Y");?> &copy; Marc-André Ramsay</small>
            <a href="admin?admin">ADMIN</a>
        </div>
    </div>
    
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.js"></script>

    <!-- Tiny MCE -->
    <script src="vendor/tinymce/js/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '.tinymcetext',
        height : "100"
      });
  </script>
</body>
</html>