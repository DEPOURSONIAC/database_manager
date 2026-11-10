  <!-- Footer -->
  <footer id="footer" class="footer light-background">

    <div class="container">

      <h3 class="sitename">
        <i class="bi bi-database-fill me-2"></i>
        Database Manager
      </h3>

      <p>
        Une application simple et intuitive pour importer,
        gérer et explorer vos bases de données SQLite
        en toute sécurité.
      </p>

      <!-- Useful Links -->
      <div class="social-links d-flex justify-content-center">

        <a href="https://github.com/DEPOURSONIAC" title="GitHub">
          <i class="bi bi-github"></i>
        </a>

        <a href="#" title="Documentation">
          <i class="bi bi-book"></i>
        </a>

        <a href="mailto:admin@localhost" title="Support">
          <i class="bi bi-envelope"></i>
        </a>

      </div>

      <div class="container">

        <!-- Copyright -->
        <div class="copyright">
          <span>Copyright &copy; <?= date('Y') ?></span>
          <strong class="px-1 sitename">Database Manager</strong>
          <span>All Rights Reserved</span>
        </div>

        <!-- Credits -->
        <div class="credits">
          Developed with
          <i class="bi bi-heart-fill text-danger"></i>
          using PHP & SQLite
        </div>

      </div>

    </div>

  </footer>
  <!-- End Footer -->


  <!-- Scroll Top -->
  <a href="#" id="scroll-top"
     class="scroll-top d-flex align-items-center justify-content-center">

    <i class="bi bi-arrow-up-short"></i>

  </a>


  <!-- Preloader -->
  <div id="preloader"></div>


  <!-- Vendor JS Files -->
  <script src="<?= BASE_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Main JS File -->
  <script src="<?= BASE_URL ?>assets/js/main.js"></script>

</body>

</html>