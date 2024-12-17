<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/'); ?>"><img class="mr-2" src="/logo.png" alt="Logo" srcset="">Go Consult</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?= ($title == 'Home') ? 'active' : ''; ?>" href="<?= base_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
                <?php if (auth()->loggedIn()): ?>
                    <a class="nav-item nav-link <?= ($title == 'Dashboard') ? 'active' : ''; ?>" href="<?= base_url('/dashboard'); ?>">Dashboard</a>
                <?php endif ?>
                <a class="nav-item nav-link <?= ($title == 'About') ? 'active' : ''; ?>" href="<?= base_url('/about'); ?>">About</a>
                <?php if (auth()->user()->inGroup('admin', 'superadmin')) : ?>
                    <a class="nav-item nav-link <?= ($title == 'User Management') ? 'active' : ''; ?>" href="<?= base_url('/admin/user-management'); ?>">User Management</a>
                    <a class="nav-item nav-link <?= ($title == 'Admin') ? 'active' : ''; ?>" href="<?= base_url('/admin'); ?>">Admin Page</a>
                <?php endif ?>
            </div>
        </div>
        <?php if (!(auth()->loggedIn())): ?>
            <a href="../login" class="btn btn-primary m-2">Log In</a>
            <a href="../login" class="btn btn-outline-primary m-2">Register</a>
        <?php else: ?>
            <a href="../logout" class="btn btn-secondary m-2">Log Out</a>
        <?php endif ?>
    </div>
</nav>