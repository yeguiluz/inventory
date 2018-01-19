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
            url: '{{ route('productsAvailable') }}',
            type: 'get',
            dataSrc: "prd"
        },
        columns: [
            {data: "id", className: 'text-right'},
            {data: "name"},
            {data: "stock",className: 'text-right'},
            {data: "price",className: 'text-right'},
            {data: null, className: 'text-center'},
            {data: null, className: 'text-center'}
        ],
        columnDefs: [
          {
              orderable: false,
              targets: 4,
              render: function (data, type, row) {
                  return "<input type='number' id='qty"+row.id+"' value=1>"
              }
          },
          {
              orderable: false,
              targets: 5,
              render: function (data, type, row) {
                  return "<div class='btn-group btn-group-xs'>" +
                          "<a href='#' onClick='addCart("+row.id+")' class='btn btn-success'>+</a>" +
                          "</div>"
              }
          },
        ]
    });

  });

  function addCart(id){
    $('#product_id').val(id);
    $('#quantity').val($('#qty'+id).val());
    document.getElementById("cart").submit();
  }
  </script>
@stop

@section('content')

<div class="row">
  <div class="col-md-10">
    <div class="panel panel-default">
      <div class="panel-body"><br>
        <h3>Tienda</h3>
        <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Añadir al carrito</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <form id="cart" class="" action="{{route('addCart')}}" method="post">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="product_id" id="product_id" value="">
          <input type="hidden" name="quantity" id="quantity" value="">
        </form>

      </div>
    </div>
  </div>
</div>
@stop
