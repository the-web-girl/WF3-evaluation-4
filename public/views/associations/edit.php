<?php ob_start(); ?>

<h1>Changer les informations de la location</h1>

<form class="form" method="post" action="<?= url('ajout-association') ?>">

    <div class="form-group">
        <input class="form-control" type="text" name="marque" value="<?= $association->getIdVehicule() ?>">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="modele" value="<?= $association->getIdConducteur() ?>">
    </div>

    <button type="submit" class="btn-primary float-right">Enregistrez les modifications</button>
</form>



<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>