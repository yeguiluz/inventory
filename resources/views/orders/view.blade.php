@extends('layouts.main')
@section('css')
@stop
@section('js')
@stop
@section('jQuery')
  <script type="text/javascript">
  </script>
@stop

@section('content')
@php
  $total = 0;
  $totalProducts = 0;
@endphp
<br>
<div class="row">
  @if(empty($order))
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body"><br>
          <h1 class="alert-heading">Orden no existe</h1>
        </div>
      </div>
    </div>
  @else
    <div class="col-md-4">
      <div class="card">
        <h3 class="card-header">Detalle de Orden N° {{$order->id}}</h3>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cliente : {{$order->user->name}}</li>
            <li class="list-group-item">Fecha : {{$order->created_at}}</li>
            <li class="list-group-item">Status : <span class="badge badge-primary"> {{$order->status}}<span></li>
            <li class="list-group-item">Total s./ : <strong> {{number_format($order->total,2)}}</strong></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="card">
            <h3 class="card-header">Ubicación</h3>
            <div class="card-body">
              <h5 class="card-title">Dirección de Entrega:</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"> {{$order->address_order}}</li>
              </ul>
              <h5 class="card-title">Dirección Facturación:</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"> {{$order->address_invoice}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
<div class="row">
  <div class="col-md-12"><hr>
    <label for="tDatos">Productos</label>
    <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
      <thead>
        <tr>
          <th>Nombre Producto</th>
          <th>Cantidad</th>
          <th>Precio s./</th>
          <th>Total s./</th>
        </tr>
      </thead>
      <tbody>
      @forelse($order->orderDetails as $detail)
        <tr>
          <td>{{$detail->product->name}}
          </td>
          <td style="text-align:center">{{$detail->quantity}}</td>
          <td style="text-align:right">{{number_format($detail->product->price,2)}}</td>
          <td style="text-align:right">{{number_format($detail->product->price * $detail->quantity,2)}}</td>
        </tr>
        @php
          $total +=  $detail->product->price * $detail->quantity;
          $totalProducts +=$detail->quantity;
        @endphp
      @empty
        <tr>
          <td colspan = "5" style="text-align: center">No hay datos</td>
        </tr>
      @endforelse
      </tbody>
    </table>
    <a href="javascript:history.go(-1)" class="btn btn-primary">Volver</a>
  </div>

</div>

@stop
