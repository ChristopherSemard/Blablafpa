<?php $title = "BlablAFPA"; ?>



<?php ob_start(); ?>


<!-- Main -->
<main class=" m-vh-80">

    <img class="image-background" src="./assets/images/background.jpg" alt="">
    <div class="form-on-background p-4 rounded">
        <h2 class="color-secondary">Recherchez un trajet !</h2>
        <form method="post" action="./index.php?action=search">
            <div class="input">
                <div>
                    <label for="inputStart" class="mb-1">Départ</label>
                    <input type="text" id="inputStart" class="cityAutocomplete form-control" name='start' placeholder="Ville de départ">
                    <ul class="list list-group"></ul>
                </div>
                <div class="mt-2">
                    <label for="inputFinish" class="mb-1">Arrivée</label>
                    <input type="text" id="inputFinish" class="cityAutocomplete form-control" name='finish' placeholder="Ville d'arrivée">
                    <ul class="list list-group"></ul>
                </div>
            </div>
            <button type="submit" class="btn background-gradient mt-3">Rechercher</button>
        </form>
    </div>
</main>



<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>