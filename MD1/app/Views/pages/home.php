<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero dashboard-hero">
    <img class="hero-photo" src="<?= base_url('assets/images/ad-system-hero.png') ?>" alt="Organized workspace for managing daily tasks">
    <div class="hero-shade" aria-hidden="true"></div>
    <div class="container inner-copy directory-heading">
        <div>
            <span class="eyebrow">Tasks for Today Management System</span>
            <h1>Welcome <em>back.</em></h1>
            <p>Here are the tasks scheduled for <?= esc($today) ?>.</p>
        </div>
        <span class="record-count"><?= $todayCount ?> today</span>
    </div>
</section>

<section class="container table-section">
    <div class="table-toolbar">
        <strong>Today's tasks</strong>
        <span>Filtered by task date</span>
    </div>
    <div class="table-card editorial-table"><div class="table-scroll">
        <table class="table align-middle mb-0">
            <thead><tr><th scope="col">#</th><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Date</th></tr></thead>
            <tbody>
                <?php if ($tasks === []): ?>
                    <tr><td colspan="4">No tasks are scheduled for today.</td></tr>
                <?php else: ?>
                    <?php foreach ($tasks as $index => $task): ?>
                        <tr>
                            <td class="row-number" data-label="Record"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span></td>
                            <td data-label="Task"><strong><?= esc($task['title']) ?></strong></td>
                            <td data-label="Status"><span class="task-status status-<?= esc(str_replace(' ', '-', $task['status']), 'attr') ?>"><?= esc(ucwords($task['status'])) ?></span></td>
                            <td data-label="Date"><?= esc($task['task_date']) ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div></div>
</section>
<?= $this->endSection() ?>
