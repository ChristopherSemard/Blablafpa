<?php $title = $travel['start'] . '-' . $travel['destination']; ?>



<?php ob_start(); ?>

<!-- Main -->
<main class="container-lg py-5  col-xl-7 m-vh-80">

  <?php if (isset($_SESSION['ERROR_BOOKING-TRAVEL'])) : ?>
    <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_BOOKING-TRAVEL'] ?></p>
  <?php endif ?>
  <?php if (isset($_SESSION['SUCCESS_BOOKING-TRAVEL'])) : ?>
    <p class='text-center alert alert-success mt-2' role='alert'><?= $_SESSION['SUCCESS_BOOKING-TRAVEL'] ?></p>
  <?php endif ?>


  <!-- <a href="./index.php?action=travel&id=39">test</a> -->


  <?php $date = new DateTime($travel['date_start']);
  $dateFormat = $date->format('d/m/Y');
  $heure = new DateTime($travel['date_start']);
  $heureFormat = $date->format('H:i');  ?>

  <h2 class="color-primary">Trajet <strong class="color-secondary"><?= $travel['start'] . '-' . $travel['destination'] ?></strong> le <strong class="color-secondary"><?= $dateFormat ?> à <?= $heureFormat ?></strong></h2>

  <div class="card w-100 shadow-sm p-3 py-4 d-flex flex-row gap-4 mb-3">
    <div class="text-center p-1  d-flex">
      <img class="m-auto rounded-circle" src="https://i.imgur.com/bDLhJiP.jpg" width="100">
    </div>
    <div class="w-100">
      <h5 class="mt-2"><?= $user["firstname"] . " " . $user["lastname"] ?></h5>
      <div class=" mt-1">
        <p class=" h-5"><strong>Email : </strong><?= $user['email'] ?></p>
      </div>
      <div class="buttons">
        <?php if (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER']['userId'] == $travel["user_id"] || isset($_SESSION['LOGGED_USER']) && isset($userIsBooked)) : ?>
          <a type="button" href="#messages" class="btn  border-secondary  ml-3 px-4">Message</a>
          <!-- <a class="btn background-primary px-4 ms-2">Contact</a> -->
        <?php else : ?>
          <p>Réservez sur ce trajet pour rentrer en contact avec cette personne.</p>
          <!-- <a class="btn background-primary px-4 ms-2">Contact</a> -->

        <?php endif ?>
      </div>
    </div>
  </div>

  <div class="shadow-sm  p-3 rounded d-flex flex-column  mb-3">


    <div class=" d-flex gap-3 flex-wrap justify-content-between">
      <div class="vtl travel-graphic">
        <h5 class="mb-3"><i class="fa-solid fa-user"></i> <?= $travel["seat_available"] ?> passagers possibles </h5>

        <div class="event">
          <p class="date  my-1">Départ</p>
          <p class="txt m-0"><?= $travel["start"] ?></p>

          <?php $freeSeats = $travel["seat_available"] - $travelSteps[0]['seatsOccupied']; ?>
          <?php if ($freeSeats > 1) : ?>
            <p class="text-success mb-1"><?= $freeSeats ?> places disponibles</p>
          <?php elseif ($freeSeats == 1) : ?>
            <p class="text-warning mb-1">1 place disponible</p>
          <?php else : ?>
            <p class="text-danger mb-1">Aucune place disponible</p>
          <?php endif ?>
        </div>


        <?php foreach ($travelSteps as $key => $step) : ?>

          <?php $freeSeats = $travel["seat_available"] - $step['seatsOccupied']; ?>

          <?php if ($step['city_start'] != $travel["start"]) : ?>
            <div class="event">
              <p class="date my-1">Étape <?= $key ?></p>
              <p class="txt m-0"><?= $step['city_start'] ?></p>

              <?php if ($freeSeats > 1) : ?>
                <p class="text-success mb-1"><?= $freeSeats ?> places disponibles</p>
              <?php elseif ($freeSeats == 1) : ?>
                <p class="text-warning mb-1">1 place disponible</p>
              <?php else : ?>
                <p class="text-danger mb-1">Aucune place disponible</p>
              <?php endif ?>
            </div>
          <?php endif ?>

        <?php endforeach ?>


        <div class="event">
          <p class="date my-1">Arrivée</p>
          <p class="txt m-0 mb-1"><?= $travel["destination"] ?></p>
        </div>

      </div>


      <?php if (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER']['userId'] == $travel['user_id']) : ?>
        <div class="active-reservation">
          <h4>Réservations</h4>


          <?php if ($bookedUsers) : ?>
            <?php foreach ($bookedUsers as $key => $booking) : ?>


              <div class="p-2">
                <p class="mb-1"><strong><?= $booking['firstname'] . ' ' . $booking['lastname'] ?></strong></p>
                <p class="mb-1"><?= '| ' .  $booking['city_start'] . ' ' . $booking['city_finish'] ?></p>
              </div>

            <?php endforeach ?>
          <?php else : ?>
            <p>Il n'y a aucune réservation pour le moment.</p>
          <?php endif ?>
        </div>

      <?php elseif (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER']['userId'] != $travel['user_id'] && isset($userIsBooked)) : ?>

        <div class="active-reservation">

          <h4>Ma réservation</h4>

          <p class="mb-1"><?= '| ' .  $bookedUsers[$userIsBookedIndex]['city_start'] . ' ' . $bookedUsers[$userIsBookedIndex]['city_finish'] . ' - ' . $userIsBookedCount ?> place(s)</p>

        </div>

      <?php endif ?>
    </div>

    <?php if (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER']['userId'] != $travel['user_id']) : ?>
      <a class=" btn background-gradient  mt-4" href="../index.php?action=booking&id=<?= $travel['travel_id'] ?>">Réservez</a>
    <?php elseif (!isset($_SESSION['LOGGED_USER'])) : ?>
      <a class=" btn border-secondary  mt-4" href="../index.php?action=login">Vous devez être connecté pour accéder à la réservation du trajet</a>
    <?php else : ?>
      <a class=" btn btn-danger  mt-4" href="#">Vous ne pouvez pas réserver votre propre trajet</a>
    <?php endif ?>
  </div>


  <?php if (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER']['userId'] == $travel["user_id"] || isset($_SESSION['LOGGED_USER']) && isset($userIsBooked)) : ?>
    <form id="messages" class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submit-message">
      <h2>Messages</h2>
      <label for="inputMessage">Envoyer un message</label>
      <div class=" d-flex justify-content-between gap-3">
        <input type="text" class="form-control" id="inputMessage" name="message" placeholder="Tapez votre message" required value="">
        <input type="hidden" name="userId" value='<?= $_SESSION['LOGGED_USER']['userId'] ?>'>
        <input type="hidden" name="travelId" value='<?= $travel['travel_id'] ?>'>
        <button type="submit" class="btn align-self-start background-gradient ">Valider</button>
      </div>

    </form>

    <?php if ($messages) : ?>

      <div class="mt-4">

        <?php foreach ($messages as $key => $message) : ?>

          <?php $date = new DateTime($message['message_date']);
          $dateFormat = $date->format('d/m/Y à H:i'); ?>


          <?php if ($message['user_id'] == $user['user_id']) : ?>
            <div class="card bg-light mt-2 p-3 py-2 shadow-sm">
            <?php else : ?>
              <div class="card mt-2 p-3 py-2 shadow-sm">
              <?php endif ?>
              <div class="d-flex justify-content-between align-items-center">
                <p>Par <strong><?= $message['firstname'] . ' ' . $message['lastname'] ?></strong></p>
                <p>Le <?= $dateFormat ?></p>
              </div>
              <div>
                <p><?= $message['content'] ?></p>
              </div>
              </div>

            <?php endforeach ?>
            </div>
          <?php endif ?>

        <?php endif ?>



</main>



<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>