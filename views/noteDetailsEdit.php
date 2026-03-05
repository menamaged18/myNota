<div class="notes-container-create">
    <h2>Edit Detail</h2>
    
    <form method="POST" action="/note/details/update">
        <input type="hidden" name="id" value="<?= $item['id'] ?>">
        <input type="hidden" name="note_id" value="<?= $item['note_id'] ?>">
        
        <input 
            type="text" 
            name="content" 
            value="<?= htmlspecialchars($item['content']) ?>" 
            required 
            autofocus
        >
        
        <div class="button-group">
            <button type="submit" class="btn btn-add">Update Detail</button>
            <a href="/note/<?= $item['note_id'] ?>" class="btn">Cancel</a>
        </div>
    </form>
</div>