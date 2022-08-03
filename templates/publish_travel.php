<?php $title = "Publier un trajet"; ?>



<?php ob_start(); ?>


        <!-- Main -->
        <main class="container-lg py-5 col-lg-4 m-vh-80">



        <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submit-publish-travel">

                <label for="inputStart">Ville de départ</label>
                <input type="text" class="form-control cityAutocomplete" id="inputStart" name="start"  placeholder="Ville de départ du trajet" required value="Rouen">

                <label for="inputDestination">Etapes</label>
                <button type="button" id="addStep" class="btn btn-primary">Ajouter une étape</button>
                <div id="divStep">
                </div>

                <label for="inputDestination">Ville d'arrivée</label>
                <input type="text" class="form-control cityAutocomplete" id="inputDestination" name="destination"  placeholder="Ville d'arrivée du trajet"  required value="Marseille">

                <label for="inputSeats">Nombre de places disponibles pour des passagers</label>
                <input type="number" class="form-control" id="inputSeats" name="seatAvailable" required value="2" min="1" max="6">

                <label for="inputDate">Heure de départ</label>
                <input type="datetime-local" class="form-control" id="inputDate" name="date" required>

                <button type="submit" class="btn btn-primary">Valider</button>

        </form>
        <select class="autoCompleteContainer">
                
        </select>

</main>








<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>