<?php $title = "Inscription"; ?>
<?php ob_start(); ?>




        <!-- Main -->
        <main class="container-lg py-5 col-lg-4 m-vh-80">


            <h2 class="text-center mb-4">INSCRIPTION</h2>
            <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submitsignup">
                <!-- Choix de pseudo -->
                <div class="form-group">
                <label for="inputAfpaId">ID AFPA</label>
                        <input type="text" class="form-control" id="inputAfpaId" name="afpaId" placeholder="Identifiant AFPA" required value="<?= isset($_SESSION['ERROR_SIGNUP_INPUT']) ? $_SESSION['ERROR_SIGNUP_INPUT']['afpaId'] : '' ?>">
                </div>
                <!-- Choix de mot de passe -->
                <div class="form-group">
                    <label for="inputFirstName">Fist Name : </label>
                    <input type="text" class="form-control" id="inputFirstName" name="firstName" placeholder="firstname" required value="<?= isset($_SESSION['ERROR_SIGNUP_INPUT']) ? $_SESSION['ERROR_SIGNUP_INPUT']['firstName'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputLastName">Last Name :</label>
                    <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="lastname" required value="<?= isset($_SESSION['ERROR_SIGNUP_INPUT']) ? $_SESSION['ERROR_SIGNUP_INPUT']['lastName'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email :</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email" required value="<?= isset($_SESSION['ERROR_SIGNUP_INPUT']) ? $_SESSION['ERROR_SIGNUP_INPUT']['email'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Mot de passe (8 caractères minimum)</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Mot de passe" required>
                </div>
                <!-- Confirmation mot de passe -->
                <div class="form-group">
                    <label for="inputConfirmPassword">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="inputConfirmPassword" name="password_retype" placeholder="Re-tapez le mot de passe" required>
                </div>
                <!-- Bouton envoyer -->
                <button type="submit" class="btn btn-primary mt-2">Valider</button>
                
                <?php if (isset($_SESSION['ERROR_SIGNUP'])): ?>
                    <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_SIGNUP'] ?></p>
                    <?php endif ?>
                    
            </form>

        </main>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>