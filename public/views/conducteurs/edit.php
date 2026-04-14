<?php ob_start(); ?>

<h1>Changer les informations du véhicules</h1>

<form class="form" method="post" action="<?= url('ajout-conducteur') ?>">

    <div class="form-group">
        <input class="form-control" type="text" name="marque" value="<?= $conducteur->getPrenom() ?>">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="modele" value="<?= $conducteur->getNom() ?>">
    </div>

    <button type="submit" class="btn-primary float-right">Enregistrez les modifications</button>
</form>


<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>