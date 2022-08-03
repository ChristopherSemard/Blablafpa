<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">

        
    </head>

    <body>

        <!-- Header et nav -->
        <?php include_once('partials/header.php');?>
        
        <!-- Main -->
        <main class="container-lg py-5 col-lg-4 m-vh-80">

        <!-- Inserton de notre contenu ici -->
        <?= $content ?>

        </main>

        <!-- Footer -->
        <?php include_once('partials/footer.php');?>
    </body>
    
    <script src="./assets/js/travel.js"></script>
    
</html>