<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container m-3">
    <div class="row">
        <div class="col card bg-dark text-light">
            <h1>Advised solution to your problem.</h1>
            <div class="card text-white bg-secondary m-2">
                <div class="card-body">
                    <h4 class="card-title"><?= $problem['title']; ?></h4>
                    <p class="card-text"><?= $problem['description']; ?></p>
                    <h4 class="card-title">Solution</h4>
                    <p class="card-text"><?= $solution[0]['description']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>