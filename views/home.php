<div class="notes-container">
    <div class="notes-header">
        <h2>My Notes</h2>
        <a href="/note/create" class="btn btn-add">+ Add Note</a>
    </div>
    
    <ul class="notes-list">
        <?php if (!empty($notes)): ?>
            <?php foreach ($notes as $note): ?>
                <li class="note-item">
                    <a href="/note/<?= $note['id'] ?>" class="note-link">
                        <span class="note-text"><?= htmlspecialchars($note['title']) ?></span>
                        <span class="arrow">&rarr;</span>
                    </a>
                    <div class="note-actions">
                        <div>
                            <a href="/note/edit/<?= $note['id'] ?>" class="btn btn-edit">Edit</a>
                        </div>
                        <div>
                            <form method="POST" action="/note/delete/<?= $note['id'] ?>" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this note?');">
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>                            
                        </div>

                    </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-notes">No notes found. Time to create one!</p>
        <?php endif; ?>
    </ul>
</div>