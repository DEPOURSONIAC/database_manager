<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background" style="background-image: url('assets/img/hero-bg.jpg');">

    <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
      <h2>Database Manager</h2>

      <p>
        Gérez, explorez et consultez vos bases de données SQLite
        depuis une interface simple et intuitive.
      </p>

      <a href="#about" class="btn-scroll" title="Découvrir l'application">
        <i class="bi bi-chevron-down"></i>
      </a>
    </div>

  </section>
  <!-- /Hero Section -->


  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container section-title" data-aos="fade-up">
      <h2>À propos</h2>
      <p>
        Une interface dédiée à la consultation et à l'exploration
        de vos bases de données SQLite.
      </p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4 justify-content-center">

        <!-- Image conservée -->
        <div class="col-lg-4">
          <img src="assets/img/profile-img.svg" class="img-fluid" alt="Illustration d'une base de données"  >
        </div>

        <div class="col-lg-8 content">
          <h2>Explorez vos bases de données SQLite.</h2>

          <p class="fst-italic py-3">
            Database Manager est une application locale permettant
            de centraliser et de consulter facilement plusieurs
            bases de données SQLite.
          </p>

          <div class="row">

            <div class="col-lg-6">
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <strong>Stockage :</strong>
                  <span>Local</span>
                </li>

                <li>
                  <i class="bi bi-chevron-right"></i>
                  <strong>Format :</strong>
                  <span>SQLite</span>
                </li>
              </ul>
            </div>

            <div class="col-lg-6">
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <strong>Consultation :</strong>
                  <span>Lecture seule</span>
                </li>

                <li>
                  <i class="bi bi-chevron-right"></i>
                  <strong>Interface :</strong>
                  <span>Web locale</span>
                </li>
              </ul>
            </div>

          </div>

          <p class="py-3">
            Importez vos bases de données, parcourez leurs tables
            et consultez leurs contenus sans modifier les données
            d'origine.
          </p>
        </div>

      </div>

    </div>

  </section>
  <!-- /About Section -->


  <!-- Features Section -->
  <section id="features" class="services section">

    <div class="container section-title" data-aos="fade-up">
      <h2>Fonctionnalités</h2>
      <p>
        Les outils essentiels pour travailler avec vos bases SQLite.
      </p>
    </div>

    <div class="container">

      <div class="row gy-4">

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-database icon"></i>
            </div>
            <h4>Gestion des bases</h4>
            <p>
              Ajoutez, importez et gérez vos bases de données SQLite.
            </p>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-table icon"></i>
            </div>
            <h4>Exploration</h4>
            <p>
              Parcourez les tables et les vues de vos bases de données.
            </p>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-search icon"></i>
            </div>
            <h4>Recherche</h4>
            <p>
              Filtrez les données selon les colonnes et les valeurs.
            </p>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-shield-check icon"></i>
            </div>
            <h4>Lecture seule</h4>
            <p>
              Consultez vos données sans risquer de les modifier.
            </p>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- /Features Section -->


  <!-- Access Section -->
  <section id="access" class="portfolio section light-background">

    <div class="container section-title" data-aos="fade-up">
      <h2>Accéder à mes bases de données</h2>
      <p>
        Retrouvez vos bases SQLite et commencez leur exploration.
      </p>
    </div>

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-folder-plus icon"></i>
            </div>
            <h4>Importer une base</h4>
            <p>
              Ajoutez une nouvelle base de données SQLite à votre espace.
            </p>
            <a href="<?= BASE_URL ?>?page=import" class="stretched-link">
              Importer une base
            </a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-collection icon"></i>
            </div>
            <h4>Mes bases de données</h4>
            <p>
              Accédez à la liste de vos bases enregistrées.
            </p>
            <a href="<?= BASE_URL ?>?page=databases" class="stretched-link">
              Consulter mes bases
            </a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-info-circle icon"></i>
            </div>
            <h4>En savoir plus</h4>
            <p>
              Découvrez les possibilités offertes par Database Manager.
            </p>
            <a href="<?= BASE_URL ?>?page=about" class="stretched-link">
              Voir les fonctionnalités
            </a>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- /Access Section -->

</main>