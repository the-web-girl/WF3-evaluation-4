<?php

// Create Router instance
$router = new Router();

$router->get('',                'PagesController@home' );

// ROUTES POUR LES CONDUCTEURS

$router->get('liste-conducteurs',               'ConducteursController@liste' );
$router->get('ajout-conducteur',                'ConducteursController@add');
$router->post('ajout-conducteur',               'ConducteursController@save');
$router->get('liste-conducteurs/{id}/edit',     'ConducteursController@edit');
$router->post('liste-conducteurs/{id}/edit',    'ConducteursController@update');
$router->get('liste-conducteurs/{id}/delete',   'ConducteursController@delete');
$router->get('liste-conducteurs/{id}',          'ConducteursController@show');

// ROUTES POUR LES VEHICULES

$router->get('liste-vehicules',               'VehiculesController@liste' );
$router->get('ajout-vehicule',                'VehiculesController@add');
$router->post('ajout-vehicule',               'VehiculesController@save');
$router->get('liste-vehicules/{id}/edit',     'VehiculesController@edit');
$router->post('liste-vehicules/{id}/edit',    'VehiculesController@update');
$router->get('liste-vehicules/{id}/delete',   'VehiculesController@delete');
$router->get('liste-vehicules/{id}',          'VehiculesController@show');

// ROUTES POUR LES ASSOCIATIONS

$router->get('liste-associations',               'AssociationsController@liste' );
$router->get('ajout-association',                'AssociationsController@add');
$router->post('ajout-association',               'AssociationsController@save');
$router->get('liste-associations/{id}/edit',     'AssociationsController@edit');
$router->post('liste-associations/{id}/edit',    'AssociationsController@update');
$router->get('liste-associations/{id}/delete',   'AssociationsController@delete');
$router->get('liste-associations/{id}',          'AssociationsController@show');

// Run it!
$router->run();