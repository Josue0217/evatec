@extends('master')

@section('content')


<div class="row">
    <a type="button" href="{{ route('users.create') }}" class="btn btn-info btn-sm col-md-3 col-md-offset-3">Crear</a>
</div>



<table id="tabla" class="table table-bordered table-striped dataTable" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->  name}}</td>
            <td>>{{$user-> lastname}}</td>
            <td>>{{$user-> user_name}}</td>
            <td>>{{$user-> email}}</td>
            <td>
                <a type="button" href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a type="button" href="{{ route('users.edit', $user->id) }}"  class="btn btn-warning btn-sm">Editar</a>
                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id}}" class="btn btn-danger btn-sm" >Eliminar</button> 
            </td>
        
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Seguro de eliminar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <form id="formDelete" action="{{ route('users.destroy', 0) }}" data-action="{{ route('users.destroy', 0) }}" method="POST">
          @method('DELETE')
          @csrf
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </form>
      </div>
    </div>
  </div>
</div>


<script>

  window.onload = function(){
    $('#deleteModal').on('show.bs.modal', function (event) {
    console.log('Modal Abierto')
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      
      action = $('#formDelete').attr('data-action').slice(0,-1)
      action += id

      console.log(action)

      $('#formDelete').attr('action', action)
      
      var modal = $(this)
      modal.find('.modal-title').text('Se eliminara el usuario: ' + id)
    });
  }

</script>

@endsection