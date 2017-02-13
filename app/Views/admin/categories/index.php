<!-- homepage -->
<h1>Administrer les catégories</h1>

<span>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
</span>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $categorie): ?>
        <tr>
            <td><?= $categorie->id ?></td>
            <td><?= $categorie->titre_cat ?></td>
            <td>
                <a href="?p=admin.categories.edit&id=<?= $categorie->id; ?>" class="btn btn-primary">Edit</a>
                <form action="?p=admin.categories.delete" method="post" class="form-delete">
                    <input type="hidden" name="id" value="<?= $categorie->id; ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>