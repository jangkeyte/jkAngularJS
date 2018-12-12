<!DOCTYPE html>
<html lang="en-US">
<script src="/js/angular.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/main.css">
<body>

<div ng-app="myApp" ng-controller="customersCtrl"> 

<table>
  <tr>
  	<th>Stt</th>
  	<th ng-click="orderByJK('Name')">Ten cong ty</th>
  	<th ng-click="orderByJK('City')">Thanh pho</th>
  	<th ng-click="orderByJK('Country')">Quoc gia</th>
  </tr>
  <tr ng-repeat="x in myData | orderBy:jk_Sort">
    <td>{{ $index + 1 }}</td>
    <td>{{ x.Name }}</td>
    <td>{{ x.City }}</td>
    <td>{{ x.Country }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("/modules/customers.php")
    .then(function(response) {
        $scope.myData = response.data.records;
    }, function(response){
    	$scope.myData = "";
    });
$scope.orderByJK = function(x) {
	$scope.jk_Sort = x;
}
});
</script>

</body>
</html>