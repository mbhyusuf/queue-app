<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Compose a solution for client.</h1>
            <h5>Problem ID: <?= $problem['id']; ?></h5>
            <form action="../admin/solution/<?= $problem['id']; ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" placeholder=""
                        value="<?= $username; ?>"
                        required disabled>
                    <label for="floatingUsernameInput">Client</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="title" inputmode="text" placeholder=""
                        value="<?= $problem['title']; ?>"
                        required disabled>
                    <label for="floatingUsernameInput">Title</label>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" name="description" id="problemDescription" rows="7"
                        required disabled><?= $problem['description']; ?></textarea>
                    <label for="problemDescription" class="form-label">Description</label>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" name="solution" id="problemSolution" rows="7" placeholder="Write a solution..."
                        required></textarea>
                    <label for="problemSolution" class="form-label">Solution</label>
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block">Send Solution</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>