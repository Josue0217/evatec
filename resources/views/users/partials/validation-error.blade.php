@if( $errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
    {{ $error }}
    </div>
    @endforeach
@endif