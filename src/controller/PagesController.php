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

        view ('vehicules.edit', compact('vehicules'));
    }

    public function update($id){

        $vehicule= Vehicule::findOne($id);
        $vehicule= setNom($_POST['nom']);
        $vehicule= setMail($_POST['mail']);
        $vehicule->update();

        Header ('Location: '.url('liste-vehicule/' . $vehicule->GetId()));
    }

    public function delete($id) {
        $vehicule= Vehicule::findOne($id);
        $vehicule= setNom($_POST['nom']);

        $vehicule->delete();

        Header ('Location: '.url('liste-vehicule'));

    }

    public function show($id) {
        $vehicule= Vehicule::findOne($id);

        $vehicule= setId($_POST['id']);
        $vehicule= setPrenom($_POST['prenom']);
        $vehicule= setNom($_POST['nom']);

        $vehicule->show();

        Header ('Location: '.url('liste-vehicule/' . $vehicule->GetId()));
        view ('vehicules.show');

    }

}