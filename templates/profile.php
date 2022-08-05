<?php $title = $_SESSION['LOGGED_USER']['firstname'] . ' ' . $_SESSION['LOGGED_USER']['lastname']; ?>


<?php
function getMyDate($srting)
{
  $date =  new DateTime($srting);
  return $date->format('d/m/Y à H:i');
};
?>

<?php ob_start(); ?>

<!-- Main -->
<main class="container-lg py-5 col-lg-8 m-vh-80">



  <div class=" d-flex gap-3 flex-wrap justify-content-between">


    <div class="profile-travels shadow-sm d-flex flex-column p-3">
      <h4 class="mb-3">Mes trajets reservés</h4>


      <?php if ($bookings) : ?>
        <?php foreach ($bookings as $key => $booking) : ?>



          <a class="w-100 mb-2" href="../index.php/?action=travel&id=<?= $booking['travel_id'] ?>">
            <div class="card p-2 ps-3" style="display:inline-block;">
              <p class="card-title color-secondary"><?= $booking['start'] . '-' . $booking['destination'] ?> | Date de depart : <?= getMyDate($booking['date_start']) ?></p>
              <p class="mb-1 card-subtitle text-muted "><?= '| <strong>Mon étape reservée :</strong> ' .  $booking['city_start'] . ' - ' . $booking['city_finish']   ?></p>
            </div>
          </a>

        <?php endforeach ?>
      <?php else : ?>
        <p>Vous n'avez reservé aucun trajet pour l'instant.</p>
      <?php endif ?>
    </div>


    <div class="profile-travels shadow-sm p-3">
      <h4 class="mb-3">Mes trajets proposés</h4>


      <?php if ($travels) : ?>
        <?php foreach ($travels as $key => $travel) : ?>


          <a class="w-100 mb-2" href="../index.php/?action=travel&id=<?= $travel['travel_id'] ?>">
            <div class="card p-2 ps-3" style="display:inline-block;">
              <p class="card-title color-secondary"><?= $travel['start'] . '-' . $travel['destination'] ?> | Date de depart : <?= getMyDate($travel['date_start']) ?></p>
              <p class="card-subtitle text-muted "> | <?= str_replace(['[', ']', '"', ','], ['', '', '', ', '], $travel['list_steps']) ?></p>
            </div>
          </a>

        <?php endforeach ?>
      <?php else : ?>
        <p>Vous n'avez proposé aucun trajet pour l'instant.</p>
      <?php endif ?>
    </div>



  </div>



</main>



<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>