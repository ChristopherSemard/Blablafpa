<header class="p-3 text-white border-bottom bg-light vh-10">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
            <a href="../index.php" class="mb-2 mb-lg-0 text-decoration-none">
                <img class="logo" src="./assets/images/logo.png" alt="">
            </a>
            <?php  if(!isset($_SESSION['LOGGED_USER'])) :?>
                <div class="text-end">
                    <a href="../index.php?action=login" class="btn btn-primary me-2">Connexion</a>
                    <a href="../index.php?action=signup" class="btn btn-warning me-2">Inscription</a>
                    <a href="../index.php?action=publish-travel" class="btn btn-outline-primary me-2">Publier un trajet</a>
                </div>
            <?php endif ?>

            <?php  if(isset($_SESSION['LOGGED_USER'])) :?>
                <div class="text-end d-flex align-items-center gap-2">
                    <p class="m-auto"><?= $_SESSION['LOGGED_USER']['pseudo'] ?></p>
                    <form method="POST" action="../index.php?action=logout">
                        <button class="btn btn-danger">Deconnexion</button>
                    </form>
                </div>
            <?php endif ?>

        </div>
    </div>
</header>