<form method="post">
<div class="input">
    <label for="">Depart</label>
    <input type="text" class="cityAutocomplete" name='start'placeholder="depart">
</div>
    <label for="">Arrive</label>
    <input type="text" class="cityAutocomplete" name='finish' placeholder="arrive">
</div>
<input type="submit" value="Rechercher">
</form>

<input id="city" name="city" class="form-control" autocomplete="on" data-country="jp">
<?php if(isset($newTrajetList)){
var_dump($newTrajetList);
}?>
<?php if(isset($availableTravel) && count($availableTravel)>0){
echo('<pre>');
var_dump($availableTravel);
}else{ print('no travail available');}?>