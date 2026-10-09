<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero users-hero">
    <div class="container inner-copy directory-heading">
        <div>
            <span class="eyebrow">Staff directory</span>
            <h1>User <em>Accounts.</em></h1>
            <p>System access information for store personnel.</p>
        </div>
        <span class="record-count"><?= count($users) ?> <?= count($users) === 1 ? 'record' : 'records' ?></span>
    </div>
</section>

<section class="container table-section">
    <?php if (session()->getFlashdata('success')): ?><div class="alert alert-success alert-dismissible fade show" role="alert"><?= esc(session()->getFlashdata('success')) ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><?php endif ?>
    <div class="table-toolbar">
        <strong>Staff directory</strong>
        <div class="directory-actions">
            <form class="search-form" method="get" action="<?= site_url('users') ?>"><label class="visually-hidden" for="user-search">Search users</label><input class="form-control form-control-sm" id="user-search" name="q" value="<?= esc($search ?? '') ?>" placeholder="Search users"><button class="btn btn-sm btn-outline-secondary" type="submit">Search</button><?php if (! empty($search)): ?><a class="btn btn-sm btn-link" href="<?= site_url('users') ?>">Clear</a><?php endif ?></form>
            <a class="button small-button btn btn-warning" href="<?= site_url('users/new') ?>">Add user <span aria-hidden="true">+</span></a>
        </div>
    </div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table class="table align-middle mb-0">
            <thead><tr><th scope="col">#</th><th scope="col">Avatar</th><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created at</th><th scope="col">Action</th></tr></thead>
            <tbody>
                <?php if ($users === []): ?>
                    <tr><td colspan="6">No users found. Use “Add user” to create one.</td></tr>
                <?php endif ?>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <?php $initial = mb_strtoupper(mb_substr(trim($user['full_name']), 0, 1, 'UTF-8'), 'UTF-8') ?>
                        <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                        <td data-label="Avatar"><?php if (! empty($user['avatar'])): ?><img class="avatar-thumb" src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Avatar for <?= esc($user['full_name'], 'attr') ?>"><?php else: ?><span class="avatar-thumb avatar-placeholder" aria-label="Initial avatar for <?= esc($user['full_name'], 'attr') ?>"><?= esc($initial) ?></span><?php endif ?></td>
                        <td data-label="Username"><span class="username">@<?= esc($user['username']) ?></span></td>
                        <td data-label="Full name"><strong><?= esc($user['full_name']) ?></strong></td>
                        <td data-label="Created at"><?= esc($user['created_at']) ?></td>
                        <td data-label="Action" class="action-links">
                            <div class="action-buttons d-flex flex-wrap gap-2" role="group" aria-label="User actions">
                            <a class="btn btn-sm btn-outline-primary" href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#userDeleteModal" data-delete-url="<?= site_url('users/delete/' . $user['id']) ?>" data-item-name="<?= esc($user['full_name'], 'attr') ?>">Delete</button>
                            <a class="btn btn-sm btn-outline-secondary" href="<?= site_url('users/view/' . $user['id']) ?>">View</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div></div>
</section>
<div class="modal fade" id="userDeleteModal" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h2 class="modal-title fs-5" id="userDeleteModalLabel">Delete user</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><p class="mb-0">Are you sure you want to delete <strong id="userDeleteName"></strong>?</p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="userDeleteForm" method="post">
                    <?= csrf_field() ?><button type="submit" class="btn btn-danger">Delete user</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('[data-delete-url]').forEach((button) => {
    button.addEventListener('click', () => {
        document.getElementById('userDeleteForm').action = button.dataset.deleteUrl;
        document.getElementById('userDeleteName').textContent = button.dataset.itemName;
    });
});
</script>
<?= $this->endSection() ?>
