<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container m-3">
    <div class="row">
        <div class="col card bg-dark text-light">
            <h1>Hello, world! This is the about page.</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Maiores itaque quia placeat alias neque asperiores nulla mollitia,
                quae consectetur quibusdam, quos ipsam eligendi hic nobis! Tenetur, maxime.
                Nesciunt, facere labore.</p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>