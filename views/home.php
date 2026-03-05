<div class="notes-container">
    <div class="notes-header">
        <h2>My Notes</h2>
    </div>
    
    <ul class="notes-list">
        <?php if (!empty($notes)): ?>
            <?php foreach ($notes as $note): ?>
                <li class="note-item">
                    <a href="/note/<?= $note['id'] ?>" class="note-link">
                        <span class="note-text"><?= htmlspecialchars($note['title']) ?></span>
                        <span class="arrow">&rarr;</span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No notes found. Time to create one!</p>
        <?php endif; ?>
    </ul>
</div>