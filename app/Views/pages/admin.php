<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, world! Admin Page ay</h1>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($problems as $problem) : ?>
                        <tr>

                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $problem['title']; ?></td>
                            <td><?= $problem['description']; ?></td>
                            <td><?= $problem['created_at']; ?></td>
                            <td><?= $problem['updated_at']; ?></td>
                            <td><?= $problem['status']; ?></td>
                            <td>
                                <form class="m-2" action="edit/<?= $problem['id']; ?>" method="post">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-warning" type="submit">Mark as Done</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>