@extends('layouts.main')
@section('css')
@stop
@section('js')
@stop
@section('jQuery')
  <script type="text/javascript">
  function addCart(id){
    $('#product_id').val(id);
    $('#quantity').val($('#qty'+id).val());
    document.getElementById("cart").submit();
  }
  </script>
@stop

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body"><br>
        <table id="tDatos" class="table table-bordered table-striped table-condensed table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
          @foreach($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->stock}}</td>
              <td>{{$product->price}}</td>
              <td><input type="number" name="qty{{$product->id}}" id="qty{{$product->id}}" value="1"></td>
              <td>
                <a href="#" onClick="addCart({{$product->id}})" class="btn btn-success">Agregar</a>
              </td>
              <!--td><a href="{{-- route('addCart',['id' => $product->id]) --}}" class="btn btn-warning"></a></td-->
            </tr>
          @endforeach
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
