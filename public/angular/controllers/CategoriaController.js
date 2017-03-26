categoriaModule.controller('CategoriaController', function($scope, $http, API_URL) {
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
          $scope.form_title = "Añadir Categoria";
          break;
        case 'edit':
          $scope.form_title = "Editar Categoria";
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
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('Lo sentimos, ha ocurrido un error. Porfavor revise los detalles del log.');
    });
  }

 // Eliminar una categoria
 $scope.confirmDelete = function(id) {
   var isConfirmDelete = confirm('Seguro que desea eliminar este registro?');
   if (isConfirmDelete) {
     $http({
       method: 'DELETE',
       url: API_URL + 'categoria/' + id
     }).success(function(data){
       console.log(data);
       location.reload();
     }).error(function(data){
       console.log(data);
       alert('No se pudo eliminar.');
     });
   } else {
     return false;
   }
 }
});