<?php ob_start(); ?>

<h1>Devenez Conducteur</h1>

<form class="form" method="post" action="<?= url('ajout-conducteur') ?>" enctype="multipart/form-data">

    <div class="form-group">
        <input class="form-control" type="text" name="prenom" placeholder="votre prénom">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" name="nom" placeholder="votre Nom">
    </div>

    <button type="submit" class="btn-primary float-right">Enregistrez-vous</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>