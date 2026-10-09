<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero">
    <div class="container inner-copy">
        <span class="eyebrow">Customer account</span>
        <h1><?= esc($customer['full_name']) ?>.</h1>
        <p>View the complete customer record.</p>
    </div>
</section>

<section class="container about-section">
    <article class="info-card about-statement profile-card">
        <span class="eyebrow">Customer details</span>
        <dl class="profile-details">
            <div><dt>Full name</dt><dd><?= esc($customer['full_name']) ?></dd></div>
            <div><dt>Email</dt><dd><a href="mailto:<?= esc($customer['email'], 'attr') ?>"><?= esc($customer['email']) ?></a></dd></div>
            <div><dt>Phone</dt><dd><?= esc($customer['phone'] ?: 'Not provided') ?></dd></div>
            <div><dt>Created at</dt><dd><?= esc($customer['created_at']) ?></dd></div>
        </dl>
        <div class="form-actions">
            <a class="button primary btn btn-warning" href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit customer</a>
            <a class="button secondary light-button btn btn-outline-secondary" href="<?= site_url('customers') ?>">Back to customers</a>
        </div>
    </article>
</section>
<?= $this->endSection() ?>
