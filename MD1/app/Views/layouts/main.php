<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AD System built with CodeIgniter 4.">
    <meta name="theme-color" content="#090909">
    <title><?= esc($title) ?> | AD System</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/ad-logo.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="page-<?= esc($page, 'attr') ?>">
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>" aria-label="AD System home">
                <img class="brand-logo" src="<?= base_url('assets/images/ad-logo.png') ?>" alt="" width="48" height="48">
                <span>AD <b>System</b></span>
            </a>
            <nav class="desktop-nav" aria-label="Main navigation">
                <a class="<?= $page === 'home' ? 'active' : '' ?>" <?= $page === 'home' ? 'aria-current="page"' : '' ?> href="<?= site_url('/') ?>">Home</a>
                <a class="<?= $page === 'tasks' ? 'active' : '' ?>" <?= $page === 'tasks' ? 'aria-current="page"' : '' ?> href="<?= site_url('tasks') ?>">Task List</a>
                <a class="<?= $page === 'customers' ? 'active' : '' ?>" <?= $page === 'customers' ? 'aria-current="page"' : '' ?> href="<?= site_url('customers') ?>">Customers</a>
                <a class="<?= $page === 'users' ? 'active' : '' ?>" <?= $page === 'users' ? 'aria-current="page"' : '' ?> href="<?= site_url('users') ?>">Users</a>
                <a class="<?= $page === 'profile' ? 'active' : '' ?>" <?= $page === 'profile' ? 'aria-current="page"' : '' ?> href="<?= site_url('profile') ?>">Profile</a>
                <a class="<?= $page === 'about' ? 'active' : '' ?>" <?= $page === 'about' ? 'aria-current="page"' : '' ?> href="<?= site_url('about') ?>">About</a>
            </nav>
            <details class="mobile-menu">
                <summary aria-label="Open navigation"><span></span><span></span></summary>
                <nav aria-label="Mobile navigation">
                    <a class="<?= $page === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                    <a class="<?= $page === 'tasks' ? 'active' : '' ?>" href="<?= site_url('tasks') ?>">Task List</a>
                    <a class="<?= $page === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                    <a class="<?= $page === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                    <a class="<?= $page === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a>
                    <a class="<?= $page === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
                </nav>
            </details>
        </div>
    </header>

    <main id="main-content"><?= $this->renderSection('content') ?></main>

    <footer>
        <div class="container footer-bottom"><span>AD System</span><span>IT0049 &middot; Web System Technologies</span></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
