<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories | Takum Admn</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>
  <body>
    <header id="header">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a class="active" href="/admin/categories">Takum Gift</a></li>
                            <li><a href="/admin/categories">Categories</a></li>
                            <li><a href="/admin/products">Products</a></li>
                            <li><a href="/admin/usuario_producto">User's Products</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    <div class="container">
      <h2>Categories</h2>
      <div ng-controller="CategoriaController">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Add Category</button>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="categoria in categorias">
              <td>@{{ categoria.id }}</td>
              <td>@{{ categoria.nombre }}</td>
              <td>
                <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', categoria.id)">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(categoria.id)">
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
                <form name="frmCategoria" class="form-horizontal" novalidate="">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="categoriaNombre" name="categoriaNombre" placeholder="Category name." value="@{{nombre}}" ng-model="categoria.nombre" ng-required="true">
                      <span ng-show="frmCategoria.categoriaNombre.$invalid && frmCategoria.categoriaNombre.$touched">Name required.</span>
                    </div>
                  </div>  
                    
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmCategoria.$invalid">Save</button>
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.6/ngStorage.min.js"></script>

    <!-- Angular Application Scripts  -->
    <script src="{{ asset('angular/app.js') }}"></script>
    <script src="{{ asset('angular/controllers/CategoriaController.js') }}"></script>
  </body>
</html>