<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use \CodeIgniter\Shield\Models\UserIdentityModel;

$userIdentityModel = new UserIdentityModel;

?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>User Detail</h1>
            <div
                class="card text-white bg-secondary">
                <div class="card-body">
                    <h4 class="card-title">id: <?= $user->id; ?></h4>
                    <p class="card-text">username: <?= $user->username; ?></p>
                    <p class="card-text">email: <?= $userIdentityModel->where('user_id', $user->id)->findAll()[0]->secret; ?></p>
                    <p class="card-text">active: <?= $user->active; ?></p>
                    <p class="card-text">last_active: <?= $user->last_active; ?></p>
                    <p class="card-text">created_at: <?= $user->created_at; ?></p>
                    <p class="card-text">updated_at: <?= $user->updated_at; ?></p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>