<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero users-hero">
    <div class="container inner-copy">
        <span class="eyebrow">User accounts</span>
        <h1><?= esc($heading) ?>.</h1>
        <p>Create or update an account. Avatar files must be JPG or PNG and no larger than 2MB.</p>
    </div>
</section>

<section class="container form-section">
    <div class="form-card">
        <?php if (service('validation')->getErrors()): ?>
            <div class="form-errors"><?= service('validation')->listErrors() ?></div>
        <?php endif ?>
        <form action="<?= esc($formAction, 'attr') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required maxlength="50">
            <label for="full_name">Full name</label>
            <input class="form-control" id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required maxlength="100">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" type="email" value="<?= esc(old('email', $user['email'] ?? '')) ?>" maxlength="100">
            <?php if (! empty($user['id'])): ?>
                <label for="avatar">Profile picture</label>
                <input class="form-control" id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
                <small class="form-help">JPG or PNG, maximum 2MB. The saved image is resized to a 300×300 thumbnail.</small>
            <?php endif ?>
            <div class="form-actions"><button class="button primary btn btn-warning" type="submit">Save user</button><a class="button secondary light-button btn btn-outline-secondary" href="<?= site_url('users') ?>">Cancel</a></div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>
