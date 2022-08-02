<?php $title = "BLABLAFPA"; ?>



<?php ob_start(); ?>


<a href="./index.php?action=travel&id=39">test</a>
<?php var_dump($_SESSION ); ?>


<?php $content = ob_get_clean(); ?>


<?php require('base.php') ?>