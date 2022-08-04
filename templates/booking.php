<?php $title = "Réserver un trajet"; ?>



<?php ob_start(); ?>


<!-- Main -->
<main class="container-lg py-5 col-lg-4 m-vh-80">

    <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submit-booking">

        <label for="inputStart">Ville de départ</label>
        <select type="select" class="form-control select-start" id="inputStart" name="start" required>
            <option value="">-- Choisir la ville de départ --</option>
            <?php
            $steps = json_decode($travel['list_steps']);
            foreach ($steps as $key => $step) {
                if ($step != $travel["destination"]) {
                    echo '<option value="' . $step . '">' . $step . '</option>';
                }
            }
            ?>
            <select>

                <label for="inputDestination">Ville d'arrivée</label>
                <select type="select" class="form-control select-destination" id="inputDestination" name="destination" required>
                    <option value="">-- Choisir la ville d'arrivée --</option>
                    <?php
                    $steps = json_decode($travel['list_steps']);
                    foreach ($steps as $key => $step) {
                        if ($step != $travel["start"]) {
                            echo '<option value="' . $step . '">' . $step . '</option>';
                        }
                    }
                    ?>
                    <select>

                        <input type="hidden" name="travel_id" value="<?= $travel['travel_id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['LOGGED_USER']['userId'] ?>">
                        <button type="submit" class="btn  background-gradient">Valider</button>

                        <?php if (isset($_SESSION['ERROR_BOOKING-TRAVEL'])) : ?>
                            <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_BOOKING-TRAVEL'] ?></p>
                        <?php endif ?>
    </form>

</main>


<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>