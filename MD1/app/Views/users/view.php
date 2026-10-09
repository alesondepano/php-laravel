<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero users-hero">
    <div class="container inner-copy">
        <span class="eyebrow">User account</span>
        <h1><?= esc($user['full_name']) ?>.</h1>
        <p>View the complete user record and prepared avatar.</p>
    </div>
</section>

<section class="container about-section">
    <article class="info-card about-statement profile-card">
        <?php $initial = mb_strtoupper(mb_substr(trim($user['full_name']), 0, 1, 'UTF-8'), 'UTF-8') ?>
        <?php if (! empty($user['avatar'])): ?><img class="profile-avatar" src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Avatar for <?= esc($user['full_name'], 'attr') ?>"><?php else: ?><span class="profile-avatar avatar-placeholder" aria-label="Initial avatar for <?= esc($user['full_name'], 'attr') ?>"><?= esc($initial) ?></span><?php endif ?>
        <span class="eyebrow">User details</span>
        <h2><?= esc($user['full_name']) ?></h2>
        <dl class="profile-details">
            <div><dt>Username</dt><dd>@<?= esc($user['username']) ?></dd></div>
            <div><dt>Email</dt><dd><?= esc($user['email'] ?? 'Not provided') ?></dd></div>
            <div><dt>Created at</dt><dd><?= esc($user['created_at']) ?></dd></div>
        </dl>
        <div class="form-actions">
            <a class="button primary btn btn-warning" href="<?= site_url('users/edit/' . $user['id']) ?>">Edit user</a>
            <a class="button secondary light-button btn btn-outline-secondary" href="<?= site_url('users') ?>">Back to users</a>
        </div>
    </article>
</section>
<?= $this->endSection() ?>
