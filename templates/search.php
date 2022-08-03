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
var_dump($availableTravel);
}else{ print('no travail available');}?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./assets/js/autocomplete.js"></script>