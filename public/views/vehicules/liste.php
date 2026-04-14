<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th class="card-header">ID</td>
            <th class="card-header">Marque</td>
            <th class="card-header">Modèle</th>
            <th class="card-header">Couleur</th>
            <th class="card-header">Immatriculation</th>
            <th class="card-header">Changer informations</th>
            <th class="card-header">Supprimer informations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $v) : ?>
        <tr>
            <td scope="row"><?= $v['id']?></td>
            <td><?= $v['marque']?></td>
            <td><?= $v['modele']?></td>
            <td><?= $v['couleur']?></td>
            <td><?= $v['immatriculation']?></td>
            <td><a href="<?= 'liste-vehicules/'.$v['id'] .'/edit'?>" class="btn btn-primary">Modifier</a></td>
            <td><a href="<?= 'liste-vehicules/'. $v['id'] . '/delete'?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>


<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>