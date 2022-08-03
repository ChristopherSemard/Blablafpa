<?php $title = "BLABLAFPA"; ?>



<?php ob_start(); ?>


        <!-- Main -->
        <main class=" m-vh-80">
            
            <img class="image-background" src="./assets/images/background.jpg" alt="">
            <div class="form-on-background p-4 rounded" >
                <h2 class="color-secondary" >Recherchez un trajet !</h2>
                <form method="post">
                    <div class="input">
                        <label for="">Départ</label>
                        <input type="text" class="cityAutocomplete form-control" name='start'placeholder="Ville de départ">
                        <label for="">Arrivée</label>
                        <input type="text" class="cityAutocomplete form-control" name='finish' placeholder="Ville d'arrivée">
                    </div>
                    <button type="submit" class="btn background-gradient mt-2" >Rechercher</button>
                </form>
            </div>
        </main>



<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>