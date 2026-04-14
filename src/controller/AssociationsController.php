<?php


class AssociationsController {


    public function liste() {

        $associations = Association::findAll();

        view('associations.liste', compact('associations'));
    }

    public function add() {

        view('associations.add');
    }

    public function save() {

        $association = new Association;
        $association->setId($_POST['id']);
        $association->setIdVehicule($_POST['id_vehicule']);
        $association->setIdConducteur($_POST['id_conducteur']);

        $association->save();

        redirectTo('liste-associations');

    }

    public function edit($id) {
        $association= Association::findOne($id);

        view ('associations.edit', compact('association'));
    }

    public function update($id){

        $association= Association::findOne($id);
        $association= setIdVehicule($_POST['id_vehicule']);
        $association= setIdConducteur($_POST['id_conducteur']);
        $association->update();

        Header ('Location: '.url('liste-association/' . $association->GetId()));
    }


    public function delete($id) {
        $association = Association::findOne($id);
        $association->delete();

        Header('Location: ' . url('liste-associations'));
    }
}


