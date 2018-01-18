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
            url: '{{ route('productsList') }}',
            type: 'get',
            dataSrc: "prd"
        },
        columns: [
            {data: "id", className: 'text-right'},
            {data: "name"},
            {data: "stock", classname: 'text-center'},
            {data: "price", className: 'text-right', type:'num'}
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
        <h4>Crear Productos</h4>
        {{ Form::open(['route' => 'productsStore', 'method' => 'POST']) }}
			     <div class="form-group">
             {{ Form::label('name', 'Nombre') }}
             {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Producto', 'required']) }}
           </div>
           <div class="form-group">
             {{ Form::label('price', 'Precio') }}
             {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => '5.00', 'required']) }}
           </div>
           <div class="form-group">
             {{ Form::label('stock', 'Stock') }}
             {{ Form::text('stock', null, ['class' => 'form-control', 'placeholder' => '10.00', 'required']) }}
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
        <h4>Lista de Productos</h4>
        <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
