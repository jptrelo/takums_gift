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
      
      <div class="row" ng-controller="PortalController">
        <div class="col-md-12">
          <div class="modal-dialog" style="margin-bottom:0">
              <div class="modal-content">
                  <div class="panel-heading">
                      <h3 class="panel-title">Sign in and chose any gift.</h3>
                  </div>
                  <div class="panel-body">
                      <form name="frmSignin" role="form" novalidate="">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="example@gmail.com" id="email" name="email" type="email" ng-model="email" autofocus="" ng-required="true">
                                  <span ng-show="frmSignin.email.$invalid && frmSignin.email.$touched">E-mail required.</span>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" id="password" name="password" type="password" ng-model="password" value="" ng-required="true">
                                  <span ng-show="frmSignin.password.$invalid && frmSignin.password.$touched">Password required.</span>
                              </div>
                              <!-- Change this to a button or input when using this as a form -->
                              <button type="button" class="btn btn-sm btn-success" id="a-login" ng-click="signin()" ng-disabled="frmSignin.$invalid">Login</button>
                          </fieldset>
                      </form>
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
    <script src="{{ asset('angular/controllers/PortalController.js') }}"></script>
    <script src="{{ asset('angular/services/PortalService.js') }}"></script>
</html>