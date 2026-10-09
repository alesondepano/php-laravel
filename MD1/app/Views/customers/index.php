<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero">
    <div class="container inner-copy directory-heading">
        <div>
            <span class="eyebrow">Accounts directory</span>
            <h1>Customer <em>Accounts.</em></h1>
            <p>Contact information for registered customers.</p>
        </div>
        <span class="record-count"><?= count($customers) ?> records</span>
    </div>
</section>

<section class="container table-section">
    <div class="table-toolbar">
        <strong>Customer directory</strong>
        <a class="button small-button btn btn-warning" href="<?= site_url('customers/new') ?>">Add customer <span aria-hidden="true">+</span></a>
    </div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table class="table align-middle mb-0">
            <thead><tr><th scope="col">#</th><th scope="col">Full name</th><th scope="col">Email address</th><th scope="col">Phone number</th><th scope="col">Action</th></tr></thead>
            <tbody>
                <?php foreach ($customers as $index => $customer): ?>
                    <tr>
                        <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                        <td data-label="Full name"><strong><?= esc($customer['full_name']) ?></strong></td>
                        <td data-label="Email"><a href="mailto:<?= esc($customer['email'], 'attr') ?>"><?= esc($customer['email']) ?></a></td>
                        <td data-label="Phone"><?= esc($customer['phone']) ?></td>
                        <td data-label="Action"><a class="edit-link" href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div></div>
</section>
<?= $this->endSection() ?>
