<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero">
    <div class="container inner-copy directory-heading">
        <div>
            <span class="eyebrow">Accounts directory</span>
            <h1>Customer <em>Accounts.</em></h1>
            <p>Contact information for registered customers.</p>
        </div>
        <span class="record-count"><?= count($customers) ?> <?= count($customers) === 1 ? 'record' : 'records' ?></span>
    </div>
</section>

<section class="container table-section">
    <?php if (session()->getFlashdata('success')): ?><div class="alert alert-success alert-dismissible fade show" role="alert"><?= esc(session()->getFlashdata('success')) ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><?php endif ?>
    <div class="table-toolbar">
        <strong>Customer directory</strong>
        <div class="directory-actions">
            <form class="search-form" method="get" action="<?= site_url('customers') ?>"><label class="visually-hidden" for="customer-search">Search customers</label><input class="form-control form-control-sm" id="customer-search" name="q" value="<?= esc($search ?? '') ?>" placeholder="Search customers"><button class="btn btn-sm btn-outline-secondary" type="submit">Search</button><?php if (! empty($search)): ?><a class="btn btn-sm btn-link" href="<?= site_url('customers') ?>">Clear</a><?php endif ?></form>
            <a class="button small-button btn btn-warning" href="<?= site_url('customers/new') ?>">Add customer <span aria-hidden="true">+</span></a>
        </div>
    </div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table class="table align-middle mb-0">
            <thead><tr><th scope="col">#</th><th scope="col">Full name</th><th scope="col">Email address</th><th scope="col">Phone number</th><th scope="col">Action</th></tr></thead>
            <tbody>
                <?php if ($customers === []): ?>
                    <tr><td colspan="5">No customers found. Use “Add customer” to create one.</td></tr>
                <?php endif ?>
                <?php foreach ($customers as $index => $customer): ?>
                    <tr>
                        <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                        <td data-label="Full name"><strong><?= esc($customer['full_name']) ?></strong></td>
                        <td data-label="Email"><a href="mailto:<?= esc($customer['email'], 'attr') ?>"><?= esc($customer['email']) ?></a></td>
                        <td data-label="Phone"><?= esc($customer['phone']) ?></td>
                        <td data-label="Action" class="action-links">
                            <div class="action-buttons d-flex flex-wrap gap-2" role="group" aria-label="Customer actions">
                            <a class="btn btn-sm btn-outline-primary" href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#customerDeleteModal" data-delete-url="<?= site_url('customers/delete/' . $customer['id']) ?>" data-item-name="<?= esc($customer['full_name'], 'attr') ?>">Delete</button>
                            <a class="btn btn-sm btn-outline-secondary" href="<?= site_url('customers/view/' . $customer['id']) ?>">View</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div></div>
</section>
<div class="modal fade" id="customerDeleteModal" tabindex="-1" aria-labelledby="customerDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h2 class="modal-title fs-5" id="customerDeleteModalLabel">Delete customer</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><p class="mb-0">Are you sure you want to delete <strong id="customerDeleteName"></strong>?</p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="customerDeleteForm" method="post">
                    <?= csrf_field() ?><button type="submit" class="btn btn-danger">Delete customer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('[data-delete-url]').forEach((button) => {
    button.addEventListener('click', () => {
        document.getElementById('customerDeleteForm').action = button.dataset.deleteUrl;
        document.getElementById('customerDeleteName').textContent = button.dataset.itemName;
    });
});
</script>
<?= $this->endSection() ?>
