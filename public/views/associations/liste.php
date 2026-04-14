<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th class="card-header">ID</td>
            <th class="card-header">ID Véhicule</td>
            <th class="card-header">ID Conducteur</th>
            <th class="card-header">Changer informations</th>
            <th class="card-header">Supprimer informations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($associations as $a) : ?>
        <tr>
            <td scope="row"><?= $a['id']?></td>
            <td><?= $a['id_vehicule']?></td>
            <td><?= $a['id_conducteur']?></td>
            <td><a href="<?= 'liste-associations/'.$a['id'] .'/edit'?>" class="btn btn-primary">Modifier</a></td>
            <td><a href="<?= 'liste-associations/'. $a['id'] . '/delete'?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>


<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>