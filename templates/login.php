<?php $title = "Connexion"; ?>



<?php ob_start(); ?>


<!-- Main -->
<main class="container-lg py-5 col-lg-4 m-vh-80">


        <h2 class="text-center mb-4">CONNEXION</h2>

        <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submitlogin">
                <?php if (isset($_SESSION['SUCCESS_SIGNIN'])) : ?>
                        <p class='text-center alert alert-success mt-2' role='alert'><?= $_SESSION['SUCCESS_SIGNIN'] ?></p>
                <?php endif ?>
                <label for="inputAfpaId">ID AFPA</label>
                <input type="number" class="form-control" id="inputAfpaId" name="afpaId" placeholder="Identifiant AFPA" required value="<?= isset($_SESSION['ERROR_LOGIN_INPUT']) ? $_SESSION['ERROR_LOGIN_INPUT']['afpaId'] : '' ?>">
                <label for="inputPassword">Mot de passe</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Mot de passe" required>
                <button type="submit" class="btn background-gradient">Valider</button>

                <?php if (isset($_SESSION['ERROR_LOGIN'])) : ?>
                        <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_LOGIN'] ?></p>
                <?php endif ?>
                <a href="../index.php?action=signup" class="text-center nav-link">Pas encore de compte ? Inscrivez vous !</a>
        </form>

</main>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>