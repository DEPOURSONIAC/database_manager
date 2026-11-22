<div class="container-fluid py-4">

    <!-- En-tête -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none">Accueil</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none">Bases de données</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Importer
                    </li>
                </ol>
            </nav>

            <h1 class="h3 fw-bold mb-1">Importer une base de données</h1>
            <p class="text-muted mb-0">
                Ajoutez une base SQLite existante ou créez-en une à partir d'un script SQL.
            </p>
        </div>

        <a href="#" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Retour aux bases
        </a>
    </div>

    <!-- Méthodes d'import -->
    <div class="row g-4 mb-4">

        <!-- Import SQLite -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-3">
                            <i class="bi bi-database fs-3"></i>
                        </div>
                        <div>
                            <h2 class="h5 fw-bold mb-1">Importer une base SQLite</h2>
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                Fichier .db / .sqlite
                            </span>
                        </div>
                    </div>

                    <p class="text-muted mb-4">
                        Importez un fichier SQLite existant pour l'ajouter à votre espace
                        de gestion.
                    </p>

                    <div class="border border-2 border-dashed rounded-3 p-5 text-center mb-3">
                        <i class="bi bi-cloud-arrow-up text-primary display-4"></i>
                        <h3 class="h6 fw-semibold mt-3">Déposez votre fichier ici</h3>
                        <p class="text-muted small mb-3">
                            ou sélectionnez un fichier depuis votre ordinateur
                        </p>
                        <input
                            type="file"
                            class="form-control"
                            accept=".db,.sqlite,.sqlite3"
                        >
                    </div>

                    <div class="d-flex align-items-center text-muted small mb-4">
                        <i class="bi bi-info-circle me-2"></i>
                        Formats acceptés : .db, .sqlite, .sqlite3
                    </div>

                    <div class="mb-3">
                        <label for="databaseName" class="form-label fw-semibold">
                            Nom de la base
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="databaseName"
                            placeholder="Ex : ecommerce"
                        >
                        <div class="form-text">
                            Ce nom sera utilisé pour identifier la base dans l'application.
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary w-100" disabled>
                        <i class="bi bi-upload me-2"></i>
                        Importer la base
                    </button>

                </div>
            </div>
        </div>

        <!-- Import SQL -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-3 bg-success bg-opacity-10 text-success p-3">
                            <i class="bi bi-filetype-sql fs-3"></i>
                        </div>
                        <div>
                            <h2 class="h5 fw-bold mb-1">Créer depuis un script SQL</h2>
                            <span class="badge bg-success bg-opacity-10 text-success">
                                Fichier .sql
                            </span>
                        </div>
                    </div>

                    <p class="text-muted mb-4">
                        Créez une nouvelle base SQLite en important un script contenant
                        vos instructions SQL.
                    </p>

                    <div class="border border-2 border-dashed rounded-3 p-5 text-center mb-3">
                        <i class="bi bi-file-earmark-code text-success display-4"></i>
                        <h3 class="h6 fw-semibold mt-3">Sélectionnez votre script SQL</h3>
                        <p class="text-muted small mb-3">
                            Le script sera utilisé pour initialiser la nouvelle base.
                        </p>
                        <input
                            type="file"
                            class="form-control"
                            accept=".sql"
                        >
                    </div>

                    <div class="d-flex align-items-center text-muted small mb-4">
                        <i class="bi bi-info-circle me-2"></i>
                        Format accepté : .sql
                    </div>

                    <div class="mb-3">
                        <label for="sqlDatabaseName" class="form-label fw-semibold">
                            Nom de la nouvelle base
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="sqlDatabaseName"
                            placeholder="Ex : gestion_stock"
                        >
                        <div class="form-text">
                            Une nouvelle base SQLite sera créée avec ce nom.
                        </div>
                    </div>

                    <button type="button" class="btn btn-success w-100" disabled>
                        <i class="bi bi-plus-circle me-2"></i>
                        Créer la base
                    </button>

                </div>
            </div>
        </div>

    </div>

    <!-- Informations -->
    <div class="row g-4">

        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 fw-bold mb-3">
                        <i class="bi bi-folder2-open text-primary me-2"></i>
                        Organisation des fichiers
                    </h2>

                    <p class="text-muted">
                        Chaque base importée sera organisée dans son propre dossier.
                    </p>

                    <div class="bg-light rounded-3 p-3">
                        <pre class="mb-0 small text-dark">storage/
└── databases/
    ├── ecommerce/
    │   ├── ecommerce.db
    │   └── ecommerce.sql
    │
    └── gestion_stock/
        ├── gestion_stock.db
        └── gestion_stock.sql</pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h5 fw-bold mb-3">
                        <i class="bi bi-shield-check text-success me-2"></i>
                        Sécurité de l'import
                    </h2>

                    <ul class="list-unstyled mb-0">
                        <li class="d-flex gap-2 mb-3">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Vérification du format des fichiers importés.</span>
                        </li>
                        <li class="d-flex gap-2 mb-3">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Protection contre les noms de fichiers dangereux.</span>
                        </li>
                        <li class="d-flex gap-2 mb-3">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Stockage des bases hors du répertoire public.</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Contrôle des accès aux fichiers SQLite.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>