<main class="container-fluid py-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= BASE_URL ?>?action=home" class="text-decoration-none">
                    Accueil
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="<?= BASE_URL ?>?action=databases" class="text-decoration-none">
                    Mes bases de données
                </a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                Ecommerce
            </li>
        </ol>
    </nav>


    <!-- Page heading -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <div class="d-flex align-items-center gap-2 mb-2">
                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                    <i class="bi bi-database text-primary fs-4"></i>
                </div>

                <span class="badge rounded-pill text-bg-success">
                    <i class="bi bi-check-circle me-1"></i>
                    Disponible
                </span>
            </div>

            <h1 class="h3 fw-bold mb-1">Ecommerce</h1>

            <p class="text-muted mb-0">
                Explorez les tables et les vues de cette base de données SQLite.
            </p>
        </div>

        <a href="<?= BASE_URL ?>?action=databases"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Retour aux bases
        </a>

    </div>


    <!-- Database information -->
    <div class="row g-3 mb-4">

        <!-- Tables -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">

                    <div class="rounded-3 bg-primary bg-opacity-10 p-3">
                        <i class="bi bi-table fs-3 text-primary"></i>
                    </div>

                    <div>
                        <p class="text-muted small mb-1">Tables</p>
                        <h2 class="h3 fw-bold mb-0">8</h2>
                    </div>

                </div>
            </div>
        </div>

        <!-- Views -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">

                    <div class="rounded-3 bg-info bg-opacity-10 p-3">
                        <i class="bi bi-eye fs-3 text-info"></i>
                    </div>

                    <div>
                        <p class="text-muted small mb-1">Vues</p>
                        <h2 class="h3 fw-bold mb-0">2</h2>
                    </div>

                </div>
            </div>
        </div>

        <!-- Access mode -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">

                    <div class="rounded-3 bg-success bg-opacity-10 p-3">
                        <i class="bi bi-shield-check fs-3 text-success"></i>
                    </div>

                    <div>
                        <p class="text-muted small mb-1">Mode d'accès</p>
                        <h2 class="h5 fw-bold mb-0">Lecture seule</h2>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Database details -->
    <div class="row g-4">

        <!-- Tables and views -->
        <div class="col-12 col-lg-8">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-0 px-4 pt-4">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                        <div>
                            <h2 class="h5 fw-bold mb-1">
                                Objets de la base de données
                            </h2>

                            <p class="text-muted small mb-0">
                                Sélectionnez une table ou une vue pour consulter son contenu.
                            </p>
                        </div>

                        <span class="badge text-bg-light">
                            10 objets
                        </span>

                    </div>

                </div>


                <div class="card-body px-4">

                    <!-- Search -->
                    <div class="input-group mb-4">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search text-muted"></i>
                        </span>

                        <input type="search"
                               class="form-control"
                               placeholder="Rechercher une table ou une vue...">

                    </div>


                    <!-- Tables -->
                    <div class="d-flex align-items-center justify-content-between mb-3">

                        <h3 class="h6 fw-bold mb-0">
                            <i class="bi bi-table text-primary me-2"></i>
                            Tables
                        </h3>

                        <span class="badge bg-primary bg-opacity-10 text-primary">
                            8 tables
                        </span>

                    </div>


                    <div class="list-group list-group-flush mb-4">

                        <a href="<?= BASE_URL ?>?action=table&id=1&table=customers"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">

                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">customers</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>

                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=orders"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">orders</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=products"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">products</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=categories"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">categories</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=order_items"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">order_items</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=payments"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">payments</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=suppliers"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">suppliers</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=reviews"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                    <i class="bi bi-table text-primary"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">reviews</span>
                                    <div class="small text-muted">Table SQLite</div>
                                </div>
                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>

                    </div>


                    <!-- Views -->
                    <div class="d-flex align-items-center justify-content-between mb-3">

                        <h3 class="h6 fw-bold mb-0">
                            <i class="bi bi-eye text-info me-2"></i>
                            Vues
                        </h3>

                        <span class="badge bg-info bg-opacity-10 text-info">
                            2 vues
                        </span>

                    </div>


                    <div class="list-group list-group-flush">

                        <a href="<?= BASE_URL ?>?action=table&id=1&table=customer_orders"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">

                                <div class="rounded-3 bg-info bg-opacity-10 p-2">
                                    <i class="bi bi-eye text-info"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">customer_orders</span>
                                    <div class="small text-muted">Vue SQLite</div>
                                </div>

                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>


                        <a href="<?= BASE_URL ?>?action=table&id=1&table=product_statistics"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                            <div class="d-flex align-items-center gap-3">

                                <div class="rounded-3 bg-info bg-opacity-10 p-2">
                                    <i class="bi bi-eye text-info"></i>
                                </div>

                                <div>
                                    <span class="fw-semibold">product_statistics</span>
                                    <div class="small text-muted">Vue SQLite</div>
                                </div>

                            </div>

                            <i class="bi bi-chevron-right text-muted"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        <!-- Sidebar information -->
        <div class="col-12 col-lg-4">

            <!-- Database information -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 px-4 pt-4">
                    <h2 class="h5 fw-bold mb-0">
                        <i class="bi bi-info-circle text-primary me-2"></i>
                        Informations
                    </h2>
                </div>

                <div class="card-body px-4">

                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <span class="text-muted">Nom</span>
                        <span class="fw-semibold">ecommerce</span>
                    </div>

                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <span class="text-muted">Identifiant</span>
                        <span class="fw-semibold">#1</span>
                    </div>

                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <span class="text-muted">Format</span>
                        <span class="fw-semibold">SQLite</span>
                    </div>

                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <span class="text-muted">Fichier</span>
                        <span class="fw-semibold">ecommerce.db</span>
                    </div>

                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <span class="text-muted">Répertoire</span>
                        <span class="fw-semibold">ecommerce/</span>
                    </div>

                    <div class="d-flex justify-content-between py-3">
                        <span class="text-muted">Enregistrée le</span>
                        <span class="fw-semibold">21/11/2026</span>
                    </div>

                </div>

            </div>


            <!-- Security information -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="rounded-3 bg-success bg-opacity-10 p-2">
                            <i class="bi bi-shield-lock fs-4 text-success"></i>
                        </div>

                        <h2 class="h6 fw-bold mb-0">
                            Protection des données
                        </h2>
                    </div>

                    <p class="text-muted small mb-3">
                        Cette base est ouverte en lecture seule. Les données originales ne peuvent pas être modifiées depuis Database Manager.
                    </p>

                    <div class="d-flex align-items-center gap-2 text-success small fw-semibold">
                        <i class="bi bi-check-circle-fill"></i>
                        Accès en lecture seule activé
                    </div>

                </div>

            </div>

        </div>

    </div>

</main>