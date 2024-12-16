<?php

/*
Plugin Name: Custom Api
Plugin URI: http://custom.api
Description: Permet de faire des appels API vers Peel_produits.
Version: 1.0
Author: Wilfried Bourguignon
Author URI: http://custom.api
License: GPL2
*/

if ( !defined( 'ABSPATH' ) ) exit;

// Fonction pour obtenir la connexion à la base de données secondaire
function get_custom_db_connection() {
    return new wpdb('root', '', 'cinema', 'localhost');
}

// Initialisation de la connexion à la base de données secondaire
add_action('init', function() {
    global $another_db;

    $another_db = get_custom_db_connection();

    if ($another_db->last_error) {
        error_log('Erreur de connexion à la base de données secondaire : ' . $another_db->last_error);
    } else {
        error_log('Connexion à la base de données secondaire réussie.');
    }
});

// Enregistrement de la route API
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/data', array(
        'methods' => 'GET',
        'callback' => 'get_custom_data',
    ));
});

// Callback pour récupérer les données
function get_custom_data() {
    global $another_db;

    // Définir le nom de la table
    $table_name = $another_db->prefix . 'movie';

    // Exécuter la requête SQL
    $results = $another_db->get_results("SELECT * FROM $table_name");

    // Si aucune donnée n'est trouvée, renvoyer une erreur
    if (empty($results)) {
        return new WP_Error('no_data', 'Aucune donnée trouvée', array('status' => 404));
    }

    // Retourner les résultats sous forme de réponse API
    return rest_ensure_response($results);
}
