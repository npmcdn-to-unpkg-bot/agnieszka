<form id="addCategory" method="POST" action="/categories" class="col-md-6">
    {{ csrf_field() }}

    <div class="form-group">
        <label forn="name">Category:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create category</button>
    </div>
</form>