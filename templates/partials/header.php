<header class="p-3  vh-10">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
            <a href="../index.php" class="mb-2 mb-lg-0 text-decoration-none">
                <img class="logo" src="./assets/images/logo.png" alt="Logo BlablAFPA">
            </a>
            <?php  if(!isset($_SESSION['LOGGED_USER'])) :?>
                <div class="text-end">
                    <a href="../index.php?action=login" class="btn background-gradient  me-2">Connexion</a>
                    <a href="../index.php?action=signup" class="btn background-primary me-2">Inscription</a>
                </div>
            <?php endif ?>

            <?php  if(isset($_SESSION['LOGGED_USER'])) :?>
                <div class="text-end d-flex align-items-center gap-2">
                    <p class="m-auto"><?= $_SESSION['LOGGED_USER']['firstname'] .' '. $_SESSION['LOGGED_USER']['lastname'] ?></p>
                    <a href="../index.php?action=publish-travel" class="btn border-secondary me-2">Publier un trajet</a>
                    <form method="POST" action="../index.php?action=logout">
                        <button class="btn btn-danger">Deconnexion</button>
                    </form>
                </div>
            <?php endif ?>

        </div>
    </div>
</header>