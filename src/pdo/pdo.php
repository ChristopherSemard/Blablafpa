<?php

// Test de connexion
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blablafpa;charset=utf8', 'blablafpa', 'iES8Gnf*e-g3XFM'); 
  
}

// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
