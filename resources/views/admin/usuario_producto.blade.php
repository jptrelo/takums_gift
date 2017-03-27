<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User's Products | Takum Admn</title>

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
      <h2>User's Products</h2>
      <div ng-controller="UsuarioProductoController">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Product</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="usuario_producto in usuario_productos">
              <td>@{{ usuario_producto.id }}</td>
              <td>@{{ usuario_producto.usuario_portal.nombre }}</td>
              <td>@{{ usuario_producto.usuario_portal.email }}</td>
              <td>@{{ usuario_producto.producto.titulo }}</td>
              <td>                
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(usuario_producto.id)">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
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
    <script src="{{ asset('angular/controllers/UsuarioProductoController.js') }}"></script>
  </body>
</html>