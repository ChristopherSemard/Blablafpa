<header class="p-2 p-lg-3  vh-10 d-flex">
    <div class="container m-auto">
        <div class="d-flex flex-wrap align-items-center  justify-content-between">
            <a href="../index.php" class="d-flex mb-2 mb-lg-0 text-decoration-none">
                <img class="logo d-lg-none m-auto" src="../assets/images/logo-mini.png" alt="Logo BlablAFPA">
                <img class="logo d-none d-lg-block m-auto" src="../assets/images/logo.png" alt="Logo BlablAFPA">
            </a>
            <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
                <div class="text-end d-none d-lg-block">
                    <a href="../index.php?action=login" class="btn background-gradient  me-2">Connexion</a>
                    <a href="../index.php?action=signup" class="btn background-primary me-2">Inscription</a>
                </div>
            <?php else : ?>
                <div class="text-end  d-none d-lg-flex align-items-center gap-2">

                    <a class="nav-link" href="../index.php?action=profile">
                        <p class="m-auto color-secondary me-2 "><i class="fa-solid fa-circle-user"> </i> <?= $_SESSION['LOGGED_USER']['firstname'] . ' ' . $_SESSION['LOGGED_USER']['lastname'] ?></p>
                    </a>


                    <a href="../index.php?action=publish-travel" class="btn border-secondary me-2">Publier un trajet</a>
                    <form method="POST" action="../index.php?action=logout">
                        <button class="btn btn-danger">Deconnexion</button>
                    </form>
                </div>
            <?php endif ?>


            <div class="dropdown d-lg-none">
                <a class="btn background-gradient" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </a>
                <div class="dropdown-menu  dropdown-menu-end" aria-labelledby="dropdownMenuButton">


                    <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                        <a class="dropdown-item" href="../index.php?action=profile">
                            Mon profil
                        </a>
                        <a href="../index.php?action=search" class="dropdown-item">Chercher un trajet</a>
                        <a href="../index.php?action=publish-travel" class="dropdown-item">Publier un trajet</a>
                        <a href="../index.php?action=logout" class="dropdown-item">Deconnexion</a>

                    <?php else : ?>
                        <a href="../index.php?action=search" class="dropdown-item">Chercher un trajet</a>
                        <a href="../index.php?action=login" class="dropdown-item">Connexion</a>
                        <a href="../index.php?action=signup" class="dropdown-item">Inscription</a>
                    <?php endif ?>

                </div>
            </div>


        </div>
    </div>
</header>