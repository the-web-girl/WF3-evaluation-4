<?php ob_start(); ?>

<h1>Changer les informations du véhicules</h1>

<form class="form" method="post" action="<?= url('ajout-vehicule') ?>">

    <div class="form-group">
        <input class="form-control" type="text" name="marque" value="<?= $vehicule->getMarque()?>">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="modele" value="<?= $vehicule->getModele() ?>">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="couleur" value="<?= $vehicule->getCouleur() ?>">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="immatriculation" value="<?= $vehicule->getImmatriculation()?>">
    </div>

    <button type="submit" class="btn-primary float-right">Enregistrez les modifications</button>
</form>




<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>