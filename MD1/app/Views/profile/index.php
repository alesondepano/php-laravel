<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero profile-hero">
    <div class="container inner-copy">
        <span class="eyebrow">Demo account</span>
        <h1>User <em>Profile.</em></h1>
        <p>The profile page retrieves one user record through UserModel.</p>
    </div>
</section>

<section class="container about-section">
    <?php if ($user): ?>
        <article class="info-card about-statement profile-card">
            <?php $initial = mb_strtoupper(mb_substr(trim($user['full_name']), 0, 1, 'UTF-8'), 'UTF-8') ?>
            <?php if (! empty($user['avatar'])): ?><img class="profile-avatar" src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Avatar for <?= esc($user['full_name'], 'attr') ?>"><?php else: ?><span class="profile-avatar avatar-placeholder" aria-label="Initial avatar for <?= esc($user['full_name'], 'attr') ?>"><?= esc($initial) ?></span><?php endif ?>
            <span class="eyebrow">Account information</span>
            <h2><?= esc($user['full_name']) ?></h2>
            <dl class="profile-details">
                <div><dt>Username</dt><dd>@<?= esc($user['username']) ?></dd></div>
                <div><dt>Email</dt><dd><a href="mailto:<?= esc($user['email'], 'attr') ?>"><?= esc($user['email']) ?></a></dd></div>
                <div><dt>Created at</dt><dd><?= esc($user['created_at']) ?></dd></div>
            </dl>
        </article>
    <?php else: ?>
        <article class="info-card about-statement"><h2>No profile found.</h2><p>Run the task-management seeder to create the demo user.</p></article>
    <?php endif ?>
</section>
<?= $this->endSection() ?>
