<div class="container-fluid py-4">

    <!-- Page heading -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h1 class="h3 fw-bold mb-1">Mes bases de données</h1>
            <p class="text-muted mb-0">
                Gérez et explorez vos bases de données SQLite.
            </p>
        </div>

        <a href="<?= BASE_URL ?>?action=import" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Ajouter une base
        </a>

    </div>


    <!-- Statistics -->
    <div class="row g-3 mb-4">

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">

                    <div class="rounded-3 bg-primary bg-opacity-10 p-3">
                        <i class="bi bi-database fs-3 text-primary"></i>
                    </div>

                    <div>
                        <p class="text-muted small mb-1">Bases enregistrées</p>
                        <h2 class="h3 fw-bold mb-0">
                            <?= $databaseCount ?>
                        </h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">

                    <div class="rounded-3 bg-success bg-opacity-10 p-3">
                        <i class="bi bi-check-circle fs-3 text-success"></i>
                    </div>

                    <div>
                        <p class="text-muted small mb-1">Bases disponibles</p>
                        <h2 class="h3 fw-bold mb-0">
                            <?= count(array_filter($databases, fn($database) => $database['available'])) ?>
                        </h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">

                    <div class="rounded-3 bg-danger bg-opacity-10 p-3">
                        <i class="bi bi-exclamation-circle fs-3 text-danger"></i>
                    </div>

                    <div>
                        <p class="text-muted small mb-1">Bases indisponibles</p>
                        <h2 class="h3 fw-bold mb-0">
                            <?= count(array_filter($databases, fn($database) => !$database['available'])) ?>
                        </h2>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Databases list -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h5 fw-bold mb-0">Liste des bases de données</h2>

                <span class="badge text-bg-light">
                    <?= $databaseCount ?> base(s)
                </span>
            </div>
        </div>

        <div class="card-body p-0">

            <?php if (empty($databases)): ?>

                <!-- Empty state -->
                <div class="text-center py-5 px-3">

                    <i class="bi bi-database-x display-3 text-muted"></i>

                    <h3 class="h5 fw-bold mt-3">
                        Aucune base de données
                    </h3>

                    <p class="text-muted mb-4">
                        Vous n'avez pas encore enregistré de base de données.
                    </p>

                    <a href="<?= BASE_URL ?>?action=import"
                       class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>
                        Importer une base
                    </a>

                </div>

            <?php else: ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Nom</th>
                                <th>Identifiant</th>
                                <th>Disponibilité</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($databases as $database): ?>

                                <tr>

                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">

                                            <div class="rounded-3 bg-primary bg-opacity-10 p-2">
                                                <i class="bi bi-database text-primary fs-5"></i>
                                            </div>

                                            <div>
                                                <span class="fw-semibold">
                                                    <?= htmlspecialchars($database['name'], ENT_QUOTES, 'UTF-8') ?>
                                                </span>
                                                <div class="small text-muted">
                                                    Base SQLite
                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="text-muted">
                                            #<?= (int) $database['id'] ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?php if ($database['available']): ?>

                                            <span class="badge rounded-pill text-bg-success">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Disponible
                                            </span>

                                        <?php else: ?>

                                            <span class="badge rounded-pill text-bg-danger">
                                                <i class="bi bi-x-circle me-1"></i>
                                                Indisponible
                                            </span>

                                        <?php endif; ?>
                                    </td>

                                    <td class="text-end pe-4">

                                        <?php if ($database['available']): ?>

                                            <a href="<?= BASE_URL ?>?action=database&id=<?= (int) $database['id'] ?>"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>
                                                Explorer
                                            </a>

                                        <?php else: ?>

                                            <button type="button"
                                                    class="btn btn-sm btn-outline-secondary"
                                                    disabled>
                                                <i class="bi bi-eye-slash me-1"></i>
                                                Indisponible
                                            </button>

                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>