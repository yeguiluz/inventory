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

<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body"><br>
        @php
          $total = 0;
          $totalProducts = 0;
          $validateQty = '';
          $validateProducts = true;
        @endphp
        @if(empty($cart))
          <div class="alert alert-warning">
            <h4 class="alert-heading">No tienes productos en el carrito</h4>
            <a href="{{route('shop')}}" class="alert-link">Ir a la tienda</a>
          </div>
        @else
          <h4>Paso 1. Carrito de Compras</h4>
          @unless($cart->shopDetails->count())
            @php $validateQty = 'disabled'; @endphp
            @php $validateProducts = false; @endphp
          @else
          <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio s./</th>
                <th>Total s./</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
            @foreach($cart->shopDetails as $detail)
              <tr>
                <td>{{$detail->product->name}}
                  @if ($detail->quantity> $detail->product->stock)
                    <span class="badge badge-warning">
                    Solo quedan {{$detail->product->stock }}
                    </span>
                    @php $validateQty = 'disabled'; @endphp
                  @endif
                </td>
                <td style="text-align:center">{{$detail->quantity}}</td>
                <td style="text-align:right">{{number_format($detail->product->price,2)}}</td>
                <td style="text-align:right">{{number_format($detail->product->price * $detail->quantity,2)}}</td>
                <td>
                  <a href="{{route('removeItem',['id'=>$detail->id])}}" class="btn btn-warning">Eliminar</a>
                </td>
                <!--td><a href="{{-- route('addCart',['id' => $product->id]) --}}" class="btn btn-warning"></a></td-->
              </tr>
              @php
                $total +=  $detail->product->price * $detail->quantity;
                $totalProducts +=$detail->quantity;
              @endphp
            @endforeach
            </tbody>
          </table>
        @endunless
      @endif
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <br>
    <div class="card mb-3">
      <h3 class="card-header">Total s./ {{number_format($total,2)}}</h3>
      <div class="card-body">
        <h5 class="card-title">Total Productos {{number_format($totalProducts,2)}}</h5>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" {{$validateQty}} data-whatever="@mdo">Continuar</button>
        @if ($validateProducts & $validateQty=='disabled')
          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">No hay suficiente stock</h4>
            <p>Revise las cantidades de sus productos</p>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@if(!empty($cart))
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Paso 2. Dirección de Envío y Facturación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('orderCreate')}}">
      <div class="modal-body">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="shop_id" value="{{$cart->id}}">
          <input type="hidden" name="total" value="{{$total}}">
          <div class="form-group">
            <label for="address1" class="form-control-label">Dirección Envio</label>
            <textarea class="form-control" id="address1" name="address1" ></textarea>
          </div>
          <div class="form-group">
            <label for="address1" class="form-control-label">Dirección Facturación:</label>
            <textarea class="form-control" id="address2" name="address2"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
        <button type="submit" class="btn btn-primary">Crear Orden</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
@stop
