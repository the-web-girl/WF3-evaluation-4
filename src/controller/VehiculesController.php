<?php


class VehiculesController {


    public function liste() {

        $vehicules = Vehicule::findAll();

        view('vehicules.liste', compact('vehicules'));
    }

    public function add() {

        view('vehicules.add');
    }

    public function save() {

        $vehicule = new Vehicule;
        $vehicule->setId($_POST['id']);
        $vehicule->setMarque($_POST['marque']);
        $vehicule->setModele($_POST['modele']);
        $vehicule->setCouleur($_POST['couleur']);
        $vehicule->setImmatriculation($_POST['immatriculation']);

        $vehicule->save();

        redirectTo('liste-vehicules');

    }

    public function edit($id) {
        $vehicule= Vehicule::findOne($id);
        view ('vehicules.edit', compact('vehicule'));
    }

    public function update($id){

        $vehicule= Vehicule::findOne($id);

        $vehicule= setId($_POST['id']);
        $vehicule= setMarque($_POST['marque']);
        $vehicule= setModele($_POST['modele']);
        $vehicule= setCouleur($_POST['couleur']);
        $vehicule= setImmatriculation($_POST['immatriculation']);
        
        $vehicule->update();

        Header ('Location: '.url('liste-vehicule/' . $vehicule->GetId()));
    }

    public function delete($id) {
        $vehicule = Vehicule::findOne($id);
        $vehicule->delete();

        Header('Location: ' . url('liste-vehicules'));
    }
}