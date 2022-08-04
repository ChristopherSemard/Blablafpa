<?php $title = "Publier un trajet"; ?>



<?php ob_start(); ?>


<!-- Main -->
<main class="container-lg py-5 col-lg-4 m-vh-80">



        <h2 class="text-center mb-4">Publier votre trajet</h2>


        <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submit-publish-travel">

                <label for="inputStart">Ville de départ</label>
                <div>
                        <input type="text" id="inputStart" class="cityAutocomplete form-control" name='start' placeholder="Ville de départ du trajet" required>
                        <ul class="list shadow"></ul>
                </div>


                <label for="inputDestination">Etapes</label>
                <button type="button" id="addStep" class="btn background-primary">Ajouter une étape</button>
                <div id="divStep">
                </div>

                <label for="inputDestination">Ville d'arrivée</label>
                <div>
                        <input type="text" id="inputDestination" class="cityAutocomplete form-control" name='destination' placeholder="Ville d'arrivée du trajet" required>
                        <ul class="list shadow"></ul>
                </div>


                <label for="inputSeats">Nombre de places disponibles pour des passagers</label>
                <input type="number" class="form-control" id="inputSeats" name="seatAvailable" required value="2" min="1" max="6">

                <label for="inputDate">Heure de départ</label>
                <input type="datetime-local" class="form-control" id="inputDate" name="date" required>

                <button type="submit" class="btn background-gradient">Valider</button>


                <?php if (isset($_SESSION['ERROR_PUBLISH-TRAVEL'])) : ?>
                        <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_PUBLISH-TRAVEL'] ?></p>
                <?php endif ?>
        </form>


        <template id="add-step">
                <div class="d-flex justify-content-between align-items-center mb-2 gap-2 cityAutocomplete">
                        <div class="w-100">
                                <input type="text" id="inputStep" class="cityAutocomplete form-control" name='step[]' placeholder="Etape du trajet" required>
                                <ul class="list shadow"></ul>
                        </div>

                        <button type="button" class="btn btn-danger deleteStep"> X </button>
                </div>
        </template>
</main>








<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>