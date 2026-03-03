<div class="container">
    <h1 class="page-title">Note Details</h1> 
    <?php if (!empty($details)): ?>
        <ul class="details-list"> 
            <?php foreach ($details as $item): ?>
                <li class="detail-item"> 
                    <?= htmlspecialchars($item['content']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="empty-message">No details found for this note.</p>
    <?php endif; ?>
</div>