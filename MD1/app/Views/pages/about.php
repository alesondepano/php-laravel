<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="inner-hero about-hero">
    <div class="container inner-copy">
        <span class="eyebrow">About the project</span>
        <h1>Simple structure.<br><em>Strong foundation.</em></h1>
        <p>AD System demonstrates how CodeIgniter's MVC structure turns browser requests into clear, useful pages.</p>
    </div>
</section>

<section class="container about-section">
    <article class="info-card about-statement">
        <span class="eyebrow">How it works</span>
        <h2>A clear path from request to response.</h2>
        <p>Each browser URL is mapped to a controller through a route. The controller prepares the page data, then sends that data to a view that renders the final HTML.</p>
        <p>The account records currently come from PHP arrays. A database-backed model can replace these arrays in a future module without changing the overall page structure.</p>
    </article>
    <aside class="info-card mvc-card">
        <span class="eyebrow">MVC flow</span>
        <ol class="process-list">
            <li><span>1</span><div><strong>Route</strong><small>Matches the requested URL</small></div></li>
            <li><span>2</span><div><strong>Controller</strong><small>Prepares the page data</small></div></li>
            <li><span>3</span><div><strong>View</strong><small>Renders the final HTML</small></div></li>
        </ol>
    </aside>
</section>
<?= $this->endSection() ?>
