<?php ob_start(); ?>

<h1>Quel véhicule souhaitez-vous enregistrer ?</h1>

<form class="form" method="post" action="<?= url('ajout-vehicule') ?>" enctype="multipart/form-data">

    <div class="form-group">
        <input class="form-control" type="text" name="marque" placeholder="Marque du véhicule">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="modele" placeholder="Modèle">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="couleur" placeholder="Couleur">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="immatriculation" placeholder="Immatriculation du véhicule">
    </div>

    <button type="submit" class="btn-primary float-right">Enregistrez le véhicule</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>