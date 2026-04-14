<?php

class Association extends Db {

    const TABLE_NAME = "association_vehicule_conducteur";

    protected $id;
    protected $id_vehicule;
    protected $id_conducteur;

// SET
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setIdVehicule($id_vehicule) {
        $this->id_vehicule = $id_vehicule;
        return $this;
    }

    public function setIdConducteur($id_conducteur) {
        $this->id_conducteur = $id_conducteur;
        return $this;
    }

// GET

    public function getId() {
        return $this->id;
    }
    public function getIdVehicule() {
        return $this->id_vehicule;
    }
    public function getIdConducteur() {
        return $this->id_conducteur;
    }

// SAVE

    public function save()
    {
        $data = [
            "id"            => $this->getId(),
            "id_vehicule"   => $this->getIdVehicule(),
            "id_conducteur" => $this->getIdConducteur(),
        ];
        
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);
        return $data;
    }

    public static function findOne(int $id) {
        $request = [
            ['id', '=', $id]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) $element = $element[0];
        else return;

        $association = new Association;
        $association->setId($element['id']);
        $association->setIdVehicule($element['id_vehicule']);
        $association->setIdConducteur($element['id_conducteur']);

        return $association;
    }

    public static function update(){
        if ($this->id > 0){
        $data= [
            "id"=>$this->getId(),
            "id_vehicule"=>$this->getIdVehicule(),
            "id_conducteur"=>$this->getIdConducteur(),
        ];
        Db::dbUpdate(self::TABLE_NAME, $data);
        return $this;
        }
    return;
    }

    public function delete()
    {
        $data = [
            'id' => $this->getId(),
        ];

        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }
}
        

    
