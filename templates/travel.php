<?php $title = "Trajet"; ?>



<?php ob_start(); ?>
<?php var_dump($travel); ?>
<?php var_dump($user); ?>

        <!-- Main -->
        <main class="container-lg py-5 col-lg-4 m-vh-80">

        <?php if (isset($_SESSION['ERROR_BOOKING-TRAVEL'])): ?>
          <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_BOOKING-TRAVEL'] ?></p>
        <?php endif ?>
        <?php if (isset($_SESSION['SUCCESS_BOOKING-TRAVEL'])): ?>
          <p class='text-center alert alert-success mt-2' role='alert'><?= $_SESSION['SUCCESS_BOOKING-TRAVEL'] ?></p>
        <?php endif ?>


<!-- <a href="./index.php?action=travel&id=39">test</a> -->
<div class="container mt-5">

    <div class=" d-flex justify-content-center">

        <div class="col-md-12">

            <div class="card p-3 py-4 d-flex flex-row">

                <div class="text-center p-1">
                    <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                </div>

                <div class="text-center mt-5">
                    <h5 class="mt-2 pb-5"><?= $user["firstname"] . " " . $user["lastname"] ?></h5>
                    <div class="px-4 mt-1">
                        <p class=" h-5"><?= $user['email'] ?></p>
                    </div>

                    <div class="buttons">

                        <button class="btn btn-outline-primary ml-3 px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-5">Contact</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="container-lg py-5 col-lg-4 m-vh-80">



    <h1><?= $travel['date_start'] ?> </h1>
    <p class="h4 mt-5">Places disponibles : <?= $travel["seat_available"] ?> <i class="fa-solid fa-user"></i> </p>
    <div class="vtl">
        <div class="event">
            <p class="date">Départ</p>
            <p class="txt"><?= $travel["start"] ?></p>
        </div>
        <?php
        //   var_dump($travel["list_steps"]);
        $steps = json_decode($travel["list_steps"]);
        foreach ($steps as $key => $step) {
            if ($step != $travel["start"] && $step != $travel["destination"]) {
                echo '<div class="event">
                    <p class="date">Étape ' . $key . '</p>
                    <p class="txt">' . $step . '</p>
                    </div>';
            }
        } ?>
        <div class="event">
            <p class="date">Arrivée</p>
            <p class="txt"><?= $travel["destination"] ?></p>
        </div>

    </div>


    <a href="../index.php?action=booking&id=<?= $travel['travel_id'] ?>" class="btn btn-primary me-2">Réservez</a>


    <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submit-message">
        <label for="inputMessage">Message</label>
        <input type="text" class="form-control" id="inputMessage" name="message" placeholder="Tapez votre message" required value="">
        <input type="hidden" name="userId" value='<?= $_SESSION['LOGGED_USER']['userId'] ?>'>
        <input type="hidden" name="travelId" value='<?= $travel['travel_id'] ?>'>

        <button type=" submit" class="btn btn-primary">Valider</button>

    </form>

</main>

<?php var_dump($messages); ?>


</main>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>