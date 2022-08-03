<?php $title = "Trajet"; ?>



<?php ob_start(); ?>


<!-- <a href="./index.php?action=travel&id=39">test</a> -->
<h1></h1>
<div class="vtl">
  <div class="event">
    <p class="date">Départ</p>
    <p class="txt"><?= $travel["start"] ?></p>
  </div>
  <?php
//   var_dump($travel["list_steps"]);
  $steps= json_decode($travel["list_steps"]);
  foreach ($steps as $key => $step) {
    if ($step != $travel["start"] && $step != $travel["destination"] ){
        echo '<div class="event">
        <p class="date">Étape '.$key.'</p>
        <p class="txt">'.$step.'</p>
      </div>';
    }
  } ?>
  <div class="event">
    <p class="date">Arrivée</p>
    <p class="txt"><?= $travel["destination"] ?></p>
  </div>

</div>
<a href="../index.php?action=booking&id=<?=$travel['travel_id'] ?>" class="btn btn-primary me-2">Réservez</a>



<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>