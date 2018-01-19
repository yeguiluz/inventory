<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('productEdit')}}">
      <div class="modal-body">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="ed_product_id" id="ed_product_id" value="">
          <div class="form-group">
            <label for="ed_name" class="form-control-label">Nombre</label>
            <input type="text" class="form-control" id="ed_name" name="ed_name" ></textarea>
          </div>
          <div class="form-group">
            <label for="ed_price" class="form-control-label">Precio</label>
            <input type="text" class="form-control" id="ed_price" name="ed_price" ></textarea>
          </div>
          <div class="form-group">
            <label for="ed_stock" class="form-control-label">Stock</label>
            <input type="text" class="form-control" id="ed_stock" name="ed_stock" ></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
