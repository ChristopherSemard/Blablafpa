<?php $title = "Trouver un trajet"; ?>


<?php ob_start(); ?>

<?php 
function getMyDate ($srting){
    $date =  new DateTime($srting);
    return $date->format('d/m/Y à H:i');
};
?>

<main class="container d-flex flex-column m-vh-80">

        <form class="mb-3" method="post">
        <h2 class="color-secondary">Recherchez un trajet !</h2>
            <div class="input">
                <label for="">Départ</label>
                    <input type="text" value="<?= isset($input) ? $input['start'] : '' ?>" class="cityAutocomplete form-control" name='start' placeholder="Ville de départ">
                    <label for="">Arrivée</label>
                    <input type="text" value="<?= isset($input) ? $input['finish'] : '' ?>" class="cityAutocomplete form-control" name='finish' placeholder="Ville d'arrivée">
                    <!-- <label for="">Places</label>
                    <input type="number" value="<?= $_POST['seat'] ?>" class="number form-control" name='seat' placeholder="Nombre de places"> -->
            </div>
            <button type="submit" class="btn background-gradient mt-2" >Rechercher</button>
        </form>


    <div class="d-flex flex-wrap flex-column align-items-center">
        <?php if (isset($availableTravel) && count($availableTravel) > 0) :?>
            <?php foreach ($availableTravel as $travel) :?>
                <a class="w-100" href="../index.php/?action=travel&id=<?=$travel['travel_id']?>">
                    <div class="card w-100" style="display:inline-block;">
                        <div class="card-body w-100" >
                            <h5 class="card-title">Date de depart : <?=getMyDate($travel['date_start'])?></h5>
                            <h5 class="card-title"><?=$travel['start']?></h5>
                            <h6 class="card-subtitle text-muted"> |   <?=str_replace(['[',']','"',','],['','','',', '],$travel['list_steps'])?></h6>
                            <h5 class="card-title"><?=$travel['destination']?></h5>
                            <h6 class="card-subtitle text-muted"><?=$travel['firstname'] . ' .' . ucfirst(substr($travel['lastname'],0,1))  ?></h6>
                        </div>
                     </div>
                </a>
            <?php endforeach ?>
        <?php else: ?>
                    
            <p class='text-center alert alert-danger mt-2' role='alert'>Aucun trajet trouvé</p>
        <?php endif?>
    
    </div>
</main>


<script src="./assets/js/autocomplete.js"></script>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>