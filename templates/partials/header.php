<header class="p-2 p-lg-3  vh-10">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center  justify-content-between">
            <a href="../index.php" class="mb-2 mb-lg-0 text-decoration-none">
                <img class="logo d-lg-none" src="../assets/images/logo-mini.png" alt="Logo BlablAFPA">
                <img class="logo d-none d-lg-block" src="../assets/images/logo.png" alt="Logo BlablAFPA">
            </a>
            <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
                <div class="text-end">
                    <a href="../index.php?action=login" class="btn background-gradient  me-2">Connexion</a>
                    <a href="../index.php?action=signup" class="btn background-primary me-2">Inscription</a>
                </div>
            <?php endif ?>

            <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                <div class="text-end d-flex align-items-center gap-2">
                    <a class="nav-link" href="../index.php?action=profile">
                        <p class="m-auto  me-2 "><?= $_SESSION['LOGGED_USER']['firstname'] . ' ' . $_SESSION['LOGGED_USER']['lastname'] ?></p>
                    </a>
                    <a href="../index.php?action=publish-travel" class="btn border-secondary me-2">Publier un trajet</a>
                    <form method="POST" action="../index.php?action=logout">
                        <button class="btn btn-danger">Deconnexion</button>
                    </form>
                </div>
            <?php endif ?>

        </div>
    </div>
</header>