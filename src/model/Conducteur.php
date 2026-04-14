<?php

class Conducteur extends Db {

    const TABLE_NAME = "conducteur";

    protected $id;
    protected $prenom;
    protected $nom;

// SET
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

// GET

    public function getId() {
        return $this->id;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getNom() {
        return $this->nom;
    }

// SAVE

    public function save()
    {
        $data = [
            "id"        => $this->getId(),
            "prenom"    => $this->getPrenom(),
            "nom"       => $this->getNom(),
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

        $conducteur = new Conducteur;
        $conducteur->setId($element['id']);
        $conducteur->setPrenom($element['prenom']);
        $conducteur->setNom($element['nom']);

        return $conducteur;
    }

    public static function update(){
        if ($this->id > 0){
        $data= [
            "id"=>$this->getId(),
            "prenom"=>$this->getPrenom(),
            "nom"=>$this->getNom(),
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
        

    
