<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, world! This is Go Consult Dashboard!</h1>
            <form action="<?= (isset($problem)) ? "../update/{$problem['id']}" : ''; ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="title" inputmode="text" placeholder=""
                        value="<?= (isset($problem)) ? "{$problem['title']}" : ''; ?>"
                        required>
                    <label for="floatingUsernameInput">Title</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="description" inputmode="text" placeholder=""
                        value="<?= (isset($problem)) ? "{$problem['description']}" : ''; ?>"
                        required>
                    <label for="floatingUsernameInput">Description</label>
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block"><?= (isset($problem)) ? "Edit Problem" : 'Post Problem'; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>