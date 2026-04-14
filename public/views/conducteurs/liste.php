<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th class="card-header">ID</td>
            <th class="card-header">Prénom</td>
            <th class="card-header">Nom</th>
            <th class="card-header">Changer informations</th>
            <th class="card-header">Supprimer informations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conducteurs as $c) : ?>
        <tr>
            <td scope="row"><?= $c['id']?></td>
            <td><?= $c['prenom']?></td>
            <td><?= $c['nom']?></td>
            <td><a href="<?= 'liste-conducteurs/'.$c['id'] .'/edit'?>" class="btn btn-primary">Modifier</a></td>
            <td><a href="<?= 'liste-conducteurs/'. $c['id'] . '/delete'?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>


<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>