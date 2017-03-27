app.controller('UsuarioProductoController', function($scope, $http, $localStorage, API_URL) {
  // Obtener lista de productos desde API
  $http.get(API_URL + "usuario_producto")
  .success(function(response){
    $scope.usuario_productos = response;
  });


  // Eliminar un producto
 $scope.confirmDelete = function(id) {
   var isConfirmDelete = confirm('Are you sure you want to delete this record?');
   if (isConfirmDelete) {
     $http({
       method: 'DELETE',
       url: API_URL + 'usuario_producto/' + id
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