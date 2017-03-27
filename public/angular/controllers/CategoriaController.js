app.controller('CategoriaController', function($scope, $http, API_URL) {
  // Obtener lista de categorias desde API
  $http.get(API_URL + "categoria")
  .success(function(response){
    $scope.categorias = response;
  });

  // Mostrar modal ya sea para edicion como para adicion
  $scope.toggle = function(modalstate, id) {
      $scope.modalstate = modalstate;
      switch(modalstate) {
        case 'add':
          $scope.form_title = "Add Category";
          angular.copy({}, $scope.categoria);
          break;
        case 'edit':
          $scope.form_title = "Edit Category";
          $scope.id = id;

          $http.get(API_URL + 'categoria/' + id).success(function(response){
            console.log(response);
            $scope.categoria = response;
          });
          break;
        default:
          break;
      }
      console.log(id);
      $('#myModal').modal('show');
  }

  // Guardar o editar una categoria
  $scope.save = function(modalstate, id) {
    var url = API_URL + "categoria";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.categoria),
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

 // Eliminar una categoria
 $scope.confirmDelete = function(id) {
   var isConfirmDelete = confirm('Are you sure you want to delete this record?');
   if (isConfirmDelete) {
     $http({
       method: 'DELETE',
       url: API_URL + 'categoria/' + id
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