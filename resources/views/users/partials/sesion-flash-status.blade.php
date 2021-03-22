@if (session('status'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ session('status') }}
    </div>
@endif