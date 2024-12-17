<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container m-3">
    <div class="row">
        <div class="col card bg-dark text-light">
            <h1>Hello, <?= $username; ?>! This is Go Consult Dashboard!</h1>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif ?>
            <a href="../consult" class="btn btn-primary m-2">Consult</a>
            <h5>Consultation history</h5>
            <table class="table text-light">
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
                                <?php if ($problem['status'] == 'pending') : ?>
                                    <form class="m-2" action="edit/<?= $problem['id']; ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button class="btn btn-warning" type="submit">Edit</button>
                                    </form>
                                    <form class="m-2" action="delete/<?= $problem['id']; ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                <?php else: ?>
                                    <form class="m-2" action="solution/<?= $problem['id']; ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button class="btn btn-secondary" type="submit">See Solution</button>
                                    </form>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (!$problems): ?>
                <p class="font-italic">No consultation yet.</p>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>