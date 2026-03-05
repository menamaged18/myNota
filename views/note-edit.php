<div class="notes-container">
    <h2>Edit Note</h2>
    <form method="POST" action="/note/update/<?= $note['id'] ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required>
        <button type="submit" class="btn btn-edit">Update</button>
        <a href="/" class="btn">Cancel</a>
    </form>
</div>
