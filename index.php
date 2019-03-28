<!DOCTYPE html>
<html>
<head>
	<title>To do list</title>
	<link rel="stylesheet" type="text/css" href="mycss.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
<div ng-app="myApp" ng-controller="myCtrl">
	<div class="header" id="">
	  	<h2 style="margin:5px">My To Do List</h2>
	  	<input type="text" ng-model='item' placeholder="Add item..." required>
	  	<span ng-click="addlist()" class="addBtn">Add</span>
	</div>
	<ul id="myUL"  ng-repeat="list in todolist">
	<li>{{list.name}} </li><a ng-click='deleterow(list.id)'>X</a>
	</ul>
</div>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
  	$http({
 		method : "GET",
    	url : "http://localhost/todo_list/data.php"
  	}).then(function mySuccess(response) {
      	$scope.todolist = response.data;
    }, function myError(response) {
      	$scope.todolist = response.statusText;
  	});
   	$scope.addlist = function() {
  
        var httpRequest = $http({
            method: 'POST',
            url: 'http://localhost/todo_list/additem.php',
            data: {'item':$scope.item}
        }).then(function mySuccess(response) {
            $scope.todolist = response.data;
            $scope.item=null;
        }, function myError(response) {
            $scope.todolist = response.statusText;
        });
    };
    $scope.deleterow= function (i) {
      var httpRequest = $http({
            method: 'POST',
            url: 'http://localhost/todo_list/delete.php',
            data: {'item':i}
      }).then(function mySuccess(response) {
            $scope.todolist = response.data;
      }, function myError(response) {
            $scope.todolist = response.statusText;
      });
   };

});
</script>
</body>
</html>