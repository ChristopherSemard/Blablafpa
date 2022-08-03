<?php $title = "Trajet"; ?>



<?php ob_start(); ?>
<?php var_dump($travel); ?>
<?php var_dump($user); ?>

        <!-- Main -->
        <main class="container-lg py-5 col-lg-6 m-vh-80">

        <?php if (isset($_SESSION['ERROR_BOOKING-TRAVEL'])): ?>
          <p class='text-center alert alert-danger mt-2' role='alert'><?= $_SESSION['ERROR_BOOKING-TRAVEL'] ?></p>
        <?php endif ?>
        <?php if (isset($_SESSION['SUCCESS_BOOKING-TRAVEL'])): ?>
          <p class='text-center alert alert-success mt-2' role='alert'><?= $_SESSION['SUCCESS_BOOKING-TRAVEL'] ?></p>
        <?php endif ?>


<!-- <a href="./index.php?action=travel&id=39">test</a> -->


  <?php $date = New DateTime($travel['date_start']);
  $dateFormat = $date->format('d/m/Y');  
  $heure = New DateTime($travel['date_start']); 
  $heureFormat = $date->format('H:i');  ?>  

    <h2><?= $travel['start'] .'-'. $travel['destination'] ?> | <?= $dateFormat ?> à <?= $heureFormat ?></h2>


            <div class="card p-3 py-4 d-flex flex-row">
                <div class="text-center p-1 me-3 d-flex">
                    <img class="m-auto rounded-circle" src="https://i.imgur.com/bDLhJiP.jpg" width="100" >
                </div>
                <div class="w-100">
                    <h5 class="mt-2"><?= $user["firstname"] . " " . $user["lastname"] ?></h5>
                    <div class=" mt-1">
                        <p class=" h-5"><strong>Email : </strong><?= $user['email'] ?></p>
                    </div>
                    <div class="buttons">
                        <button class="btn btn-outline-primary ml-3 px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-2">Contact</button>
                    </div>
                </div>
            </div>

    <p class="h4 mt-5">Places disponibles : <?= $travel["seat_available"] ?> <i class="fa-solid fa-user"></i> </p>

    <div class=" p-3 rounded ">
    <div class="vtl  ">
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
    </div>


    <a class="w-100 btn  background-gradient  mt-2 mb-4" href="../index.php?action=booking&id=<?= $travel['travel_id'] ?>" >Réservez</a>


    <?php  if(isset($_SESSION['LOGGED_USER'])) :?>
      <form class=" d-flex flex-column gap-3" method="POST" action="../index.php?action=submit-message">
        <h2>Messages</h2>
          <label for="inputMessage">Envoyer un message</label>
          <input type="text" class="form-control" id="inputMessage" name="message" placeholder="Tapez votre message" required value="">
          <input type="hidden" name="userId" value='<?= $_SESSION['LOGGED_USER']['userId'] ?>'>
          <input type="hidden" name="travelId" value='<?= $travel['travel_id'] ?>'>

          <button type="submit" class="btn  background-gradient ">Valider</button>

      </form>

      <?php var_dump($messages); ?>
    <?php endif ?>


</main>



<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>