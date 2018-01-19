@extends('layouts.main')
@section('css')
  {!! Html::style('//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') !!}
@stop
@section('js')
  {!! Html::script('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
@stop
@section('jQuery')
  <script type="text/javascript">
  $(document).ready(function () {
    $.fn.dataTable.ext.classes.sPageButton = 'btn btn-primary';
    var table = $('#tDatos').DataTable({
        pagingType: "numbers",
        language: {
            "url":"//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        fixedColumns: true,
        ajax: {
            url: '{{ route('userList') }}',
            type: 'get',
            dataSrc: "usr"
        },
        columns: [
            {data: "id", className: 'text-right'},
            {data: "name"},
            {data: "email", classname: 'text-center'}
        ]
    });

  });
  </script>
@stop

@section('content')
<br>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Crear Usuarios</h4>
        {{ Form::open(['route' => 'userStore', 'method' => 'POST']) }}
			     <div class="form-group">
             {{ Form::label('name', 'Nombre') }}
             {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Jose Perez', 'required']) }}
           </div>
           <div class="form-group">
             {{ Form::label('email', 'Email') }}
             {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'jperez@ejemplo.com', 'required']) }}
           </div>
           <div class="form-group">
             {{ Form::label('password', 'Contraseña') }}
             <input type="password" id="password" name="password" value="" class="form-control">
           </div>
           <div class="form-group">
             {{ Form::label('type', 'Tipo Usuario') }}
             <select id="type" name="type" class="form-control">
               <option value="admin">Admin</option>
               <option value="vendor">Vendedor</option>
               <option value="client">Cliente</option>
             </select>
           </div>
           <div class="form-group">
             {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
           </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Lista de Usuarios</h4>
        <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
