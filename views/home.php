<div class="notes-container">
    <div class="notes-header">
        <h2>My Notes</h2>
    </div>
    
    <ul class="notes-list">
        <?php foreach ($notes as $note): ?>
            <li class="note-item">
                <a href="/note/<?= $note['id'] ?>" class="note-link">
                    <span class="note-text"><?= htmlspecialchars($note['body']) ?></span>
                    <span class="arrow">&rarr;</span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>