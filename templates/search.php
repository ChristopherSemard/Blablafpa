<?php $title = "Trouver un trajet"; ?>


<?php ob_start(); ?>

<form method="post">
<div class="input">
    <label for="">Depart</label>
    <input type="text" class="cityAutocomplete" name='start'placeholder="depart">
</div>
    <label for="">Arrive</label>
    <input type="text" class="cityAutocomplete" name='finish' placeholder="arrive">
</div>
</div>
    <label for="">Places</label>
    <input type="number" class="number" name='seat' placeholder="Nombre de places">
</div>
<input type="submit" value="Rechercher">
</form>

<?php if(isset($availableTravel) && count($availableTravel)>0){
echo('<pre>');
echo('<pre>');
var_dump($availableTravel);
}else{ print('no travail available');}?>
<script src="./assets/js/autocomplete.js"></script>

<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>