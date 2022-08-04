<?php $title = "Trouver un trajet"; ?>


<?php ob_start(); ?>

<?php
function getMyDate($srting)
{
    $date =  new DateTime($srting);
    return $date->format('d/m/Y à H:i');
};
?>

<main class="container d-flex flex-column m-vh-80">
    <form class="mb-3" method="post">
        <h2 class="color-secondary">Recherchez un trajet !</h2>
        <div class="input">
            <div>
                <label for="inputStart">Départ</label>
                <input type="text" id="inputStart" value="<?= isset($input) ? $input['start'] : '' ?>" class="cityAutocomplete form-control" name='start' placeholder="Ville de départ">
                <ul class="list shadow"></ul>
            </div>
            <div class="mt-2">
                <label for="inputFinish">Arrivée</label>
                <input type="text" id="inputFinish" value="<?= isset($input) ? $input['finish'] : '' ?>" class="cityAutocomplete form-control" name='finish' placeholder="Ville d'arrivée">
                <ul class="list shadow"></ul>
            </div>
            <!-- <label for="">Places</label>
                    <input type="number" value="<?= $_POST['seat'] ?>" class="number form-control" name='seat' placeholder="Nombre de places"> -->
        </div>
        <button type="submit" class="btn background-gradient mt-3">Rechercher</button>
    </form>


    <div class="d-flex flex-wrap flex-column align-items-center">
        <?php if (isset($availableTravel) && count($availableTravel) > 0) : ?>
            <h2 class="color-secondary align-self-start">Voici nos trajets !</h2>
            <?php foreach ($availableTravel as $travel) : ?>
                <a class="w-100 mb-2" href="../index.php/?action=travel&id=<?= $travel['travel_id'] ?>">
                    <div class="card shadow-sm   w-100" style="display:inline-block;">
                        <div class="card-body w-100 d-flex flex-column">
                            <h5 class="card-title color-secondary"><?= $travel['start'] . '-' . $travel['destination'] ?> | Date de depart : <?= getMyDate($travel['date_start']) ?></h5>
                            <h6 class="card-subtitle text-muted mb-3"> | <?= str_replace(['[', ']', '"', ','], ['', '', '', ', '], $travel['list_steps']) ?></h6>
                            <h6 class="card-subtitle text-muted align-self-end">Par <?= $travel['firstname'] . ' .' . ucfirst(substr($travel['lastname'], 0, 1))  ?></h6>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        <?php else : ?>

            <p class='w-100 text-center alert alert-danger mt-2' role='alert'>Aucun trajet trouvé</p>
        <?php endif ?>

    </div>
</main>


<script src="./assets/js/autocomplete.js"></script>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>