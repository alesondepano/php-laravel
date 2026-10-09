<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero about-hero">
    <div class="container inner-copy">
        <span class="eyebrow">About the developer</span>
        <h1>Organized work.<br><em>Clear progress.</em></h1>
        <p>Tasks for Today is a database-backed task-management system developed by Aleson Depano for IT0049 Web System Technologies.</p>
    </div>
</section>

<section class="container about-section">
    <article class="info-card about-statement">
        <span class="eyebrow">The system</span>
        <h2>A focused workspace for daily tasks.</h2>
        <p>The Welcome page filters the shared tasks table to show only today’s work. The Task List page retrieves every task and orders it by date.</p>
        <p>The Profile page reads the single demo user through UserModel, while this page remains a static developer profile.</p>
    </article>
    <aside class="info-card mvc-card">
        <span class="eyebrow">MVC flow</span>
        <ol class="process-list">
            <li><span>1</span><div><strong>Route</strong><small>Matches the requested URL</small></div></li>
            <li><span>2</span><div><strong>Controller</strong><small>Prepares the page data</small></div></li>
            <li><span>3</span><div><strong>Model</strong><small>Queries the database</small></div></li>
            <li><span>4</span><div><strong>View</strong><small>Renders the final HTML</small></div></li>
        </ol>
    </aside>
</section>
<?= $this->endSection() ?>
