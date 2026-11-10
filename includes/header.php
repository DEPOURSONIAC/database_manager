<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Database Manager - Gestion SQLite</title>

  <meta name="description" content="Application de gestion et d'exploration de bases de données SQLite.">
  <meta name="keywords" content="Database Manager, SQLite, PHP, gestion de bases de données">

  <!-- Favicons -->
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="icon">
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">

    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <!-- Logo -->
      <a href="<?= BASE_URL ?>" class="logo d-flex align-items-center">
        <i class="bi bi-database-fill me-2"></i>
        <h1 class="sitename">Database Manager</h1>
      </a>

      <!-- Navigation -->
      <nav id="navmenu" class="navmenu">

        <ul>

          <li>
            <a href="<?= BASE_URL ?>" class="active">
              <i class="bi bi-house me-1"></i>
              Accueil
            </a>
          </li>

          <li>
            <a href="<?= BASE_URL ?>?page=databases">
              <i class="bi bi-database me-1"></i>
              Mes bases
            </a>
          </li>

          <li>
            <a href="<?= BASE_URL ?>?page=import">
              <i class="bi bi-cloud-upload me-1"></i>
              Importer
            </a>
          </li>

          <li>
            <a href="<?= BASE_URL ?>?page=about">
              <i class="bi bi-info-circle me-1"></i>
              À propos
            </a>
          </li>

        </ul>

        <!-- Mobile Navigation Toggle -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

      </nav>

    </div>

  </header>
  <!-- End Header -->
