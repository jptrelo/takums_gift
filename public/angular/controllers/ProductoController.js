app.controller('ProductoController', function($scope, $http, API_URL) {
  // Obtener lista de productos desde API
  $http.get(API_URL + "producto")
  .success(function(response){
    $scope.productos = response.productos;
    $scope.productos.estados = response.estados;
  });

  // Mostrar modal ya sea para edicion como para adicion
  $scope.toggle = function(modalstate, id) {
      $scope.modalstate = modalstate;
      // Obtener lista de categorias desde API
      $http.get(API_URL + "categoria")
      .success(function(response){
        $scope.categorias = response;
      });
      switch(modalstate) {
        case 'add':
          $scope.form_title = "Add Product";
          angular.copy({}, $scope.producto);
          break;
        case 'edit':
          $scope.form_title = "Edit Product";
          $scope.id = id;          
          $http.get(API_URL + 'producto/' + id).success(function(response){
            console.log(response);
            $scope.producto = response;
          });
          break;
        default:
          break;
      }
      console.log(id);
      $('#myModal').modal('show');
  }

  // Obtenemos el label/key segun codigo de estado
  $scope.getKey = function(obj,value) {
    return Object.keys(obj).find(key => obj[key] === value);
  }

  // Guardar o editar un producto
  $scope.save = function(modalstate, id) {
    var url = API_URL + "producto";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.producto),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      alert(response);
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('Sorry, An error has ocurred. Please check the log for details.');
    });
  }

 // Eliminar un producto
 $scope.confirmDelete = function(id) {
   var isConfirmDelete = confirm('Are you sure you want to delete this record?');
   if (isConfirmDelete) {
     $http({
       method: 'DELETE',
       url: API_URL + 'producto/' + id
     }).success(function(data){
       console.log(data);
       alert(response);
       location.reload();
     }).error(function(data){
       console.log(data);
       alert('Unable to delete.');
     });
   } else {
     return false;
   }
 }
});