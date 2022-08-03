
<?php




function displayFormPublishTravel(){

    session_start();
        
    require('../templates/publish_travel.php');
}

function submitPublishTravel($input){

    require_once('../src/pdo/pdo.php');
    require_once('../src/Repository/TravelRepository.php');
    require_once('../src/classes/Travel.php');

    var_dump($input);

    session_start();
    
    if(isset($input['start']) && isset($input['destination']) && isset($input['seatAvailable']) && isset($input['date'])){
        
        $start = htmlspecialchars($input['start']);
        $destination = htmlspecialchars($input['destination']);
        $seatAvailable = htmlspecialchars($input['seatAvailable']);
        $date = htmlspecialchars($input['date']);

        $steps = [];
        if(isset($input['step'])){
            $steps = $input['step'];
        }


        $dateObject =  new DateTime($date);
        $dateNowObject =  new DateTime();

        if ($start == $destination){
            $_SESSION['ERROR_PUBLISH-TRAVEL'] = "La ville de départ est la même que la ville d'arrivée.";
            $_SESSION['ERROR_PUBLISH-TRAVEL_INPUT'] = $input;
            // header ('location: index.php?action=login');
            var_dump($_SESSION['ERROR_PUBLISH-TRAVEL']);
        }
        else if($dateNowObject > $dateObject){
            $_SESSION['ERROR_PUBLISH-TRAVEL'] = "La date renseignée est déjà dépassée.";
            $_SESSION['ERROR_PUBLISH-TRAVEL_INPUT'] = $input;
            // header ('location: index.php?action=login');
            var_dump($_SESSION['ERROR_PUBLISH-TRAVEL']);
        }
        else if($steps && in_array($start, $steps)){
            $_SESSION['ERROR_PUBLISH-TRAVEL'] = "La ville de départ ne peut pas être également une étape.";
            $_SESSION['ERROR_PUBLISH-TRAVEL_INPUT'] = $input;
            // header ('location: index.php?action=login');
            var_dump($_SESSION['ERROR_PUBLISH-TRAVEL']);
        }
        else if($steps && in_array($destination, $steps)){
            $_SESSION['ERROR_PUBLISH-TRAVEL'] = "La ville d'arrivée ne peut pas être également une étape.";
            $_SESSION['ERROR_PUBLISH-TRAVEL_INPUT'] = $input;
            // header ('location: index.php?action=login');
            var_dump($_SESSION['ERROR_PUBLISH-TRAVEL']);
        }

        $newTravel = new Travel($start, $destination, $_SESSION['LOGGED_USER']['userId'], $date, $seatAvailable, $steps);

        // Fonction de ../src/Repository/TravelRepository.php' pour ajouter le trajet en base de données
        $idTravel = addTravel($newTravel, $bdd);
        // header ('location: index.php?action=login');
        header ('location: index.php?action=travel&id='.$idTravel);


    }
    
    else {
        $_SESSION['ERROR_PUBLISH-TRAVEL'] = "Un des champs n'est pas rempli.";
        $_SESSION['ERROR_PUBLISH-TRAVEL_INPUT'] = $input;
        // header ('location: index.php?action=login');
        var_dump($_SESSION['ERROR_PUBLISH-TRAVEL']);
    }


}
