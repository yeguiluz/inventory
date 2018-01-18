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
            url: '{{ route('myOrders') }}',
            type: 'get',
            dataSrc: "ord"
        },
        columns: [
            {data: "id", className: 'text-right'},
            {data: "created_at"},
            {data: "status", classname: 'text-center'},
            {data: "total", className: 'text-right', type:'num'},
            {data: null}
        ],
        columnDefs: [
          {
              orderable: false,
              targets: 4,
              render: function (data, type, row) {
                  return "<div class='btn-group btn-group-xs'>" +
                          "<a href='view/"+row.id+"' class='btn btn-success'>Ver detalle</a>" +
                          "</div>"
              }
          },
        ]
    });

  });
  </script>
@stop

@section('content')
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>Mis Ordenes</h4>
        <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
          <thead>
            <tr>
              <th>Orden N°</th>
              <th>Fecha</th>
              <th>Status</th>
              <th>Total</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
