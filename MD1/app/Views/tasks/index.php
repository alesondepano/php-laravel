<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero directory-hero">
    <div class="container inner-copy directory-heading">
        <div>
            <span class="eyebrow">Complete task register</span>
            <h1>Task <em>List.</em></h1>
            <p>Every task in the system, ordered from the earliest date forward.</p>
        </div>
        <span class="record-count"><?= count($tasks) ?> <?= count($tasks) === 1 ? 'record' : 'records' ?></span>
    </div>
</section>

<section class="container table-section">
    <div class="table-toolbar"><strong>All tasks</strong><span>Ordered by task date</span></div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table class="table align-middle mb-0">
            <thead><tr><th scope="col">#</th><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Task date</th></tr></thead>
            <tbody>
                <?php if ($tasks === []): ?><tr><td colspan="4">No tasks found.</td></tr><?php endif ?>
                <?php foreach ($tasks as $index => $task): ?>
                    <tr>
                        <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                        <td data-label="Task"><strong><?= esc($task['title']) ?></strong></td>
                        <td data-label="Status"><span class="task-status status-<?= esc(str_replace(' ', '-', $task['status']), 'attr') ?>"><?= esc(ucwords($task['status'])) ?></span></td>
                        <td data-label="Task date"><?= esc($task['task_date']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div></div>
</section>
<?= $this->endSection() ?>
