<script>
var app = angular.module('myApp', []);
app.controller('brewslocal', function($scope, $http) {
   $http.get("http://brewslocal.com/service.php")
   .then(function (dataset) {$scope.brews = dataset.data;
});
});


</script>