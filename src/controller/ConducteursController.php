<?php


class ConducteursController {


    public function liste() {

        $conducteurs = Conducteur::findAll();

        view('conducteurs.liste', compact('conducteurs'));
    }

    public function add() {

        view('conducteurs.add');
    }

    public function save() {

        $conducteur = new Conducteur;
        $conducteur->setId($_POST['id']);
        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->setNom($_POST['nom']);

        $conducteur->save();

        redirectTo('liste-conducteurs');

    }

    public function edit($id) {
        $conducteur= Conducteur::findOne($id);

        view ('conducteurs.edit', compact('conducteur'));
    }

    public function update($id){

        $conducteur = Conducteur::findOne($id);
        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->setNom($_POST['nom']);
        $conducteur->update();

        Header('Location: ' . url('liste-conducteurs/' . $conducteur->getId()));
    }

    public function delete($id) {
        $conducteur = Conducteur::findOne($id);
        $conducteur->delete();

        Header('Location: ' . url('liste-conducteurs'));
    }

}

