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
        <span>Static array &middot; Read only</span>
    </div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table>
            <thead><tr><th scope="col">#</th><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Role</th></tr></thead>
            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                        <td data-label="Username"><span class="username">@<?= esc($user['username']) ?></span></td>
                        <td data-label="Full name"><strong><?= esc($user['full_name']) ?></strong></td>
                        <td data-label="Role"><span class="role-badge"><?= esc($user['role']) ?></span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div></div>
</section>
<?= $this->endSection() ?>
