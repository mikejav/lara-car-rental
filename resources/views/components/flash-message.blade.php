@if ($message = Session::get('success'))
    <div class="alert alert-success mb-4" id="FlashMessage">
        {{ $message }}
        <button type="button" class="close" onclick="location.reload(true); return false;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
