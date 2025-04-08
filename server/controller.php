<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */
require("model.php");

function updateController(){
    $nom = $_REQUEST['name'];
    $year = $_REQUEST['year'];
    $length = $_REQUEST['length'];
    $desc = $_REQUEST['description'];
    $dire = $_REQUEST['director'];
    $categorie = $_REQUEST['catégorie'];
    $age = $_REQUEST['min_age'];
    $ok = updateMovie($nom, $year, $length, $desc, $dire, $categorie, $age);
    if ($ok!=0){
        return "Le film $nom réalisé par $dire est ajouté dans la catégorie $categorie";
    }
    else{
        return false;
    }
}

/** readControler
 * 
 * @return mixed 
 */
function readController(){
    if ( isset($_REQUEST['categorie'])==false || empty($_REQUEST['categorie'])==true ){
        return false;
    }
    if ( isset($_REQUEST['film'])==false || empty($_REQUEST['film'])==true ){
        return false;
    }
    $categorie = $_REQUEST['categorie'];
    $category = ['action', 'comédie', 'drame', 'science-fiction', 'animation', 'thriller', 'horreur', 'aventure', 'fantaisie', 'documentaire'];
    if (in_array($categorie, $category)==false){
        return false;
    }
    $film = $_REQUEST['film'];
    $films = ['Le Bon, la Brute et le Truand', 'Interstellar', 'La Liste de Schindler', 'Your Name'];
    if (in_array($film, $films)==false){
        return false;
    }
    $movie = getMovie($nom, $year, $length, $desc, $dire, $categorie, $age);
    return $movie;
}

/** deleteController
 *
 * @return mixed Retourne un message de succès si le menu est supprimé avec succès,
 *               ou false si une validation échoue ou si la suppression échoue.
 */
function deleteController(){
    if ( isset($_REQUEST['categorie'])==false || empty($_REQUEST['categorie'])==true ){
        return false;
    }
    if ( isset($_REQUEST['film'])==false || empty($_REQUEST['film'])==true ){
        return false;
    }
    $categorie = $_REQUEST['categorie'];
    $category = ['action', 'comédie', 'drame', 'science-fiction', 'animation', 'thriller', 'horreur', 'aventure', 'fantaisie', 'documentaire'];
    if (in_array($categorie, $category)==false){
        return false;
    }
    $film = $_REQUEST['film'];
    $films = ['Le Bon, la Brute et le Truand', 'Interstellar', 'La Liste de Schindler', 'Your Name'];
    if (in_array($film, $films)==false){
        return false;
    }
    $ok = deleteMovie($nom, $categorie);
    if (ok!=0){
        return "Le film $nom de la catégorie $categorie a été supprimé";
    }
    else{
        return false;
    }
}