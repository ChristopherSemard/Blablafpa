<?php $title = "Trouver un trajet"; ?>


<?php ob_start(); ?>

<main class=" m-vh-80">

    <img class="image-background" src="./assets/images/background.jpg" alt="">
    <div class="form-on-background p-4 rounded">
        <h2 class="color-secondary">Recherchez un trajet !</h2>
        <form method="post">
            <div class="input">
                <label for="">Départ</label>
                <?php if (isset($_POST['start'], $_POST['finish'], $_POST['seat'])) : ?>
                    <input type="text" value="<?= $_POST['start'] ?>" class="cityAutocomplete form-control" name='start' placeholder="Ville de départ">
                    <label for="">Arrivée</label>
                    <input type="text" value="<?= $_POST['finish'] ?>" class="cityAutocomplete form-control" name='finish' placeholder="Ville d'arrivée">
                    <label for="">Places</label>
                    <input type="number" value="<?= $_POST['seat'] ?>" class="number form-control" name='seat' placeholder="Nombre de places">
                <?php else : ?>
                    <input type="text" class="cityAutocomplete form-control" name='start' placeholder="Ville de départ">
                    <label for="">Arrivée</label>
                    <input type="text" class="cityAutocomplete form-control" name='finish' placeholder="Ville d'arrivée">
                    <label for="">Places</label>
                    <input type="number" class="number form-control" name='seat' placeholder="Nombre de places">
                <?php endif ?>
            </div>
            <button type="submit" class="btn bg-success mt-2">Rechercher</button>
        </form>
        <?php if (isset($availableTravel) && count($availableTravel) > 0) :?>
            <?php foreach ($availableTravel as $travel) :?>
                <a href="../index.php/?action=travel&id=<?=$travel['travel_id']?>">
                    <div class="card" style="width: 18rem;display:inline-block;">
                        <div class="card-body">
                            <h5 class="card-title"><?=$travel['start']?></h5>
                            <h6 class="card-subtitle text-muted"> |   <?=str_replace(['[',']','"',','],['','','',', '],$travel['list_steps'])?></h6>
                            <h5 class="card-title"><?=$travel['destination']?></h5>
                            <h6 class="card-subtitle text-muted">UserId : <?=$travel['user_id']?></h6>
                        </div>
                     </div>
                </a>
            <?php endforeach ?>
        <?php else: ?>
            print('no travail available');
        } ?>
        <?php endif?>
    </div>
</main>


<script src="./assets/js/autocomplete.js"></script>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>