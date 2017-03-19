<!-- homepage -->
<h1>Administrer les articles</h1>

<span>
    <a href="?p=admin.articles.add" class="btn btn-success">Ajouter</a>
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
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->titre_post ?></td>
            <td>
                <a href="?p=admin.categories.edit&id=<?= $post->id; ?>" class="btn btn-primary">Edit</a>
                <form action="?p=admin.categories.delete" method="post" class="form-delete">
                    <input type="hidden" name="id" value="<?= $post->id; ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>