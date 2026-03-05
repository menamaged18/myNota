<div class="container">
    <div class="header-actions">
        <a href="/" class="btn-back">&larr; Back to Notes</a>
    </div>

    <h1 class="page-title"><?= htmlspecialchars($note_title) ?></h1>

    <form action="/note/details/store" method="POST" class="add-detail-form">
        <input type="hidden" name="note_id" value="<?= $note_id ?>">
        <input type="text" name="content" placeholder="Add a new task or detail..." required>
        <button type="submit" class="btn-add-detail">Add</button>
    </form>

    <?php if (!empty($details)): ?>
        <ul class="details-list"> 
            <?php foreach ($details as $item): ?>
                <li class="detail-item"> 
                    <div class="detail-content">
                        <span class="status-dot <?= $item['checked'] ? 'checked' : '' ?>"></span>
                        <span class="text"><?= htmlspecialchars($item['content']) ?></span>
                    </div>
                    
                    <div class="item-actions">
                        <a href="/note/details/edit/<?= $item['id'] ?>" class="action-link edit">Edit</a>
                        <form action="/note/details/delete/<?= $item['id'] ?>" method="POST" onsubmit="return confirm('Remove this item?')">
                            <button type="submit" class="action-link delete">Delete</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="empty-message">No details found for this note.</p>
    <?php endif; ?>
</div>