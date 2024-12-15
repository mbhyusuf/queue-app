<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Today's Clients.</h1>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
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
                            <?php
                            $userModel = new \CodeIgniter\Shield\Models\UserModel;
                            $user = $userModel->find($problem['user_id']);
                            ?>
                            <td><?= $user->username; ?></td>

                            <td><?= $problem['title']; ?></td>
                            <td><?= $problem['description']; ?></td>
                            <td><?= $problem['created_at']; ?></td>
                            <td><?= $problem['updated_at']; ?></td>
                            <td><?= $problem['status']; ?></td>
                            <td>
                                <form class="m-2" action="admin/<?= $problem['id']; ?>" method="post">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-warning" type="submit" <?= ($i > 2) ? "disabled" : ""; ?>>Advice Solution</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (!$problems): ?>
                <p class="font-italic">No work today.</p>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>