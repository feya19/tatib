<h2>Data from Database:</h2>
<ul>
    <?php foreach ($data['examples'] as $example): ?>
        <li><?= htmlspecialchars($example['name']) ?></li>
    <?php endforeach; ?>
</ul>

<a href="/pdf">Generate PDF</a>
