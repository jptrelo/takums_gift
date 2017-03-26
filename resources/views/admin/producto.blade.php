<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos | Taskum Admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>
  <body>

    <div class="container">
      <h2>Productos</h2>
      <div ng-controller="ProductoController">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Descripci&oacute;n</th>
              <th>Valor</th>
              <th>Categoria</th>
              <th>Estado</th>
              <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">A&ntilde;adir Producto</button>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="producto in productos">
              <td>@{{ producto.id }}</td>
              <td>@{{ producto.titulo }}</td>
              <td>@{{ producto.descripcion }}</td>
              <td>@{{ producto.valor | currency:"USD$" }}</td>
              <td>@{{ producto.categoria.nombre }}</td>
              <td>@{{ getKey(productos.estados, producto.estado) }}</td>
              <td>
                <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', producto.id)">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(producto.id)">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- show modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
              </div>
              <div class="modal-body">
                <form name="frmProducto" class="form-horizontal" novalidate="">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="productoTitulo" name="productoTitulo" placeholder="Titulo del producto." value="@{{titulo}}" ng-model="producto.titulo" ng-required="true">
                      <span ng-show="frmProducto.productoTitulo.$invalid && frmProducto.productoTitulo.$touched">El titulo del producto es requerido.</span>
                    </div>
                  </div>  

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Descripci&oacute;n</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="productoDescripcion" name="productoDescripcion" placeholder="Descripci&oacute;n del producto." value="@{{descripcion}}" ng-model="producto.descripcion" ng-required="true">
                      <span ng-show="frmProducto.productoDescripcion.$invalid && frmProducto.productoDescripcion.$touched">La descripci&oacute;n del producto es requerida.</span>
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-10">                 
                      <select class="form-control" id="productoCategoria" name="productoCategoria" ng-model="producto.categoria_id" ng-options="categoria.id as categoria.nombre for categoria in categorias" required></select>
                      <span ng-show="frmProducto.productoCategoria.$error.required && frmProducto.productoCategoria.$touched">La categoria es requerida.</span>
                    </div>                    
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productoValor" name="productoValor" placeholder="Valor del producto." value="@{{valor}}" ng-model="producto.valor" ng-required="true">
                      <span ng-show="frmProducto.productoValor.$invalid && frmProducto.productoValor.$touched">El valor es requerido.</span>
                    </div>

                    <label class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="productoEstado" name="productoEstado" ng-model="producto.estado" ng-options="x for (x, y) in productos.estados" required></select>
                      <span ng-show="frmProducto.productoEstado.$error.required && frmProducto.productoEstado.$touched">El estado es requerido.</span>
                    </div>
                  </div> 
                    
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmProducto.$invalid">Guardar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necesario Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Aangular Material desde CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

    <!-- Angular Application Scripts  -->
    <script src="{{ asset('angular/app.js') }}"></script>
    <script src="{{ asset('angular/controllers/ProductoController.js') }}"></script>
  </body>
</html>