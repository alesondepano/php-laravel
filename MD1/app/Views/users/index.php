<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero users-hero">
    <div class="container inner-copy directory-heading">
        <div>
            <span class="eyebrow">Staff directory</span>
            <h1>User <em>Accounts.</em></h1>
            <p>System access information for store personnel.</p>
        </div>
        <span class="record-count"><?= count($users) ?> records</span>
    </div>
</section>

<section class="container table-section">
    <div class="table-toolbar">
        <strong>Staff directory</strong>
        <a class="button small-button btn btn-warning" href="<?= site_url('users/new') ?>">Add user <span aria-hidden="true">+</span></a>
    </div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table class="table align-middle mb-0">
            <thead><tr><th scope="col">#</th><th scope="col">Avatar</th><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created at</th><th scope="col">Action</th></tr></thead>
            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                        <td data-label="Avatar"><img class="avatar-thumb" src="<?= ! empty($user['avatar']) ? base_url('uploads/avatars/' . $user['avatar']) : base_url('assets/images/ad-logo.png') ?>" alt="Avatar for <?= esc($user['full_name'], 'attr') ?>"></td>
                        <td data-label="Username"><span class="username">@<?= esc($user['username']) ?></span></td>
                        <td data-label="Full name"><strong><?= esc($user['full_name']) ?></strong></td>
                        <td data-label="Created at"><?= esc($user['created_at']) ?></td>
                        <td data-label="Action"><a class="edit-link" href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div></div>
</section>
<?= $this->endSection() ?>
