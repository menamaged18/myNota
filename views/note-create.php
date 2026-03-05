<div class="notes-container-create">
    <h2>Create a New Note</h2>
    <form method="POST" action="/note/store">
        <input type="text" name="title" placeholder="What's the plan?" required autofocus>
        
        <div class="button-group">
            <button type="submit" class="btn btn-add">Save Note</button>
            <a href="/" class="btn">Cancel</a>
        </div>
    </form>
</div>