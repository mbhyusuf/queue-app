<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use \CodeIgniter\Shield\Models\UserIdentityModel;

$userIdentityModel = new UserIdentityModel;

?>
<div class="container m-3">
    <div class="row">
        <div class="col card bg-dark text-light">
            <h1>Users</h1>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif ?>
            <table class="table text-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">active</th>
                        <th scope="col">Last Active</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>

                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $user->id; ?></td>
                            <td><?= $user->username; ?></td>
                            <td><?= $userIdentityModel->where('user_id', $user->id)->findAll()[0]->secret; ?></td>
                            <td><?= $user->active; ?></td>
                            <td><?= $user->last_active; ?></td>
                            <td><?= $user->created_at; ?></td>
                            <td><?= $user->updated_at; ?></td>
                            <td>
                                <form class="m-2" action="user/<?= $user->id; ?>" method="post">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-secondary" type="submit">Details</button>
                                </form>
                                <form class="m-2" action="user/delete/<?= $user->id; ?>" method="post">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-danger" type="submit">Delete</button>
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