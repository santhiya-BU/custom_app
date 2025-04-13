<!-- templates/Books/index.php -->
<!-- <h1>Book List</h1>

<p><?= $this->My->greet('john'); ?></p>


<?php foreach ($books as $book): ?>
    <div>
        <strong><?= h($book->title) ?></strong> by <?= h($book->author) ?><br>
        Created: <?= $this->App->formatDate($book->created) ?>
    </div>
<?php endforeach; ?> -->


<h2><?= h($customTitle) ?></h2>
<p><?= h($greeting) ?></p>
<?= $this->App->greet('john'); ?>


<?php foreach ($books as $book): ?>
    <div class="book-entry">
        <strong><?= h($book->title) ?></strong><br>
        <span class="author"><?= h($book->author) ?></span><br>
        <span class="date">Published: <?= $this->App->formatDate($book->created); ?></span>
    </div>

<?php endforeach; ?>
