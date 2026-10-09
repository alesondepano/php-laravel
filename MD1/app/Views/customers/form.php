<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero">
    <div class="container inner-copy">
        <span class="eyebrow">Customer accounts</span>
        <h1><?= esc($heading) ?>.</h1>
        <p>Enter valid customer information before saving the account.</p>
    </div>
</section>

<section class="container form-section">
    <div class="form-card">
        <?php if (service('validation')->getErrors()): ?>
            <div class="form-errors"><?= service('validation')->listErrors() ?></div>
        <?php endif ?>
        <form action="<?= esc($formAction, 'attr') ?>" method="post">
            <?= csrf_field() ?>
            <label for="full_name">Full name</label>
            <input class="form-control" id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required maxlength="100">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required maxlength="100">
            <label for="phone">Phone number</label>
            <input class="form-control" id="phone" name="phone" type="text" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20">
            <div class="form-actions"><button class="button primary btn btn-warning" type="submit">Save customer</button><a class="button secondary light-button btn btn-outline-secondary" href="<?= site_url('customers') ?>">Cancel</a></div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>
