<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero">
    <img class="hero-photo" src="<?= base_url('assets/images/ad-system-hero.png') ?>" alt="Modern retail checkout counter with a tablet, receipt printer, and barcode scanner">
    <div class="hero-shade" aria-hidden="true"></div>
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="eyebrow">AD System Management</span>
            <h1>Smart accounts.<br><em>Better business.</em></h1>
            <p class="hero-copy">A focused workspace for organizing the people behind every transaction—your customers and your team.</p>
            <div class="actions">
                <a class="button primary" href="<?= site_url('customers') ?>">Explore customers <span aria-hidden="true">&rarr;</span></a>
                <a class="button secondary" href="<?= site_url('users') ?>">Meet the team</a>
            </div>
        </div>
    </div>
</section>

<section class="container features">
    <div class="section-heading">
        <span class="eyebrow">Explore AD System</span>
        <h2>Everything in one simple place.</h2>
        <p>Browse customer and staff records or learn how the project uses MVC architecture.</p>
    </div>
    <div class="card-grid">
        <article class="feature-card">
            <span class="card-number">01</span>
            <h3>Customer Accounts</h3>
            <p>Review customer names, email addresses, and phone numbers in one organized list.</p>
            <a href="<?= site_url('customers') ?>">Open customers <span aria-hidden="true">&rarr;</span></a>
        </article>
        <article class="feature-card">
            <span class="card-number">02</span>
            <h3>User Accounts</h3>
            <p>See staff usernames, full names, and assigned roles for daily operations.</p>
            <a href="<?= site_url('users') ?>">Open users <span aria-hidden="true">&rarr;</span></a>
        </article>
        <article class="feature-card">
            <span class="card-number">03</span>
            <h3>About the Project</h3>
            <p>Learn how routes, controllers, and views work together in CodeIgniter.</p>
            <a href="<?= site_url('about') ?>">Learn more <span aria-hidden="true">&rarr;</span></a>
        </article>
    </div>
</section>
<?= $this->endSection() ?>
