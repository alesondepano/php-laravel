<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AD System — a point-of-sale account management system built with CodeIgniter 4.">
    <meta name="theme-color" content="#090909">
    <title><?= esc($title) ?> | AD System</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/ad-logo.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                <a class="<?= $page === 'about' ? 'active' : '' ?>" <?= $page === 'about' ? 'aria-current="page"' : '' ?> href="<?= site_url('about') ?>">About</a>
                <a class="<?= $page === 'customers' ? 'active' : '' ?>" <?= $page === 'customers' ? 'aria-current="page"' : '' ?> href="<?= site_url('customers') ?>">Customers</a>
                <a class="<?= $page === 'users' ? 'active' : '' ?>" <?= $page === 'users' ? 'aria-current="page"' : '' ?> href="<?= site_url('users') ?>">Users</a>
            </nav>
            <details class="mobile-menu">
                <summary aria-label="Open navigation"><span></span><span></span></summary>
                <nav aria-label="Mobile navigation">
                    <a class="<?= $page === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                    <a class="<?= $page === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
                    <a class="<?= $page === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                    <a class="<?= $page === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                </nav>
            </details>
        </div>
    </header>

    <main id="main-content"><?= $this->renderSection('content') ?></main>

    <footer>
        <div class="container footer-bottom"><span>AD System</span><span>IT0049 &middot; TW34</span></div>
    </footer>
</body>
</html>
