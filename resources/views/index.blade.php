<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gifts | Takum</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>
  <body>

    

    <div class="container">
      
      <h2>Select one or more wonderful gifts.</h2>
      <div class="row funky-show-hide" ng-controller="ProductoController">
        <div class="col-md-6" ng-repeat="producto in productos">        
          <div class="panel panel-default  panel--styled">
            <div class="panel-body">
              <div class="col-md-12 panelTop">  
                <div class="col-md-4">  
                  <img class="img-responsive" src="http://placehold.it/350x350" alt=""/>
                </div>
                <div class="col-md-8">  
                  <h2>@{{ producto.titulo }}</h2>
                  <p>@{{ producto.descripcion }}</p>
                </div>
              </div>
              
              <div class="col-md-12 panelBottom">
                
                <div class="col-md-4 text-left">
                  <h5>@{{ producto.categoria.nombre }}</h5>
                </div>
                <div class="col-md-4 text-left">
                  <span><strong>@{{ producto.valor | currency:"USD$" }}</strong></span>
                </div>                  
                <div class="col-md-4 text-center pull-right">
                  <button class="btn btn-lg btn-add-to-cart"><span class="glyphicon glyphicon-shopping-cart"></span>   I want this.</button>           
                </div>
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
    <script src="{{ asset('angular/controllers/ProductoController.js') }}"></script>
</html>