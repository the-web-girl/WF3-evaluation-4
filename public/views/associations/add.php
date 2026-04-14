<?php ob_start(); ?>

<h1>Locations</h1>

<form class="form" method="post" action="<?= url('ajout-association') ?>" enctype="multipart/form-data">

    <div class="form-group">
        <input class="form-control" type="text" name="id_location" placeholder="Véhicule">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="id_conducteur" placeholder="Locataire">
    </div>

    <button type="submit" class="btn-primary float-right">Enregister la location</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>