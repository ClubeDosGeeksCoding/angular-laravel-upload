'use strict';
var app = angular.module('cdg',[]);

app.factory('imagensService',function($http){
	return{
		get: function(){
			return $http.get('imagens');
		},
		post: function(data){
			return $http.post('imagens',data,{
				withCredentials: true,
				headers: {"Content-type":undefined},
				transformRequest: angular.identity
			});
		},
		delete: function(id){
			return $http.delete('imagens/'+id);
		}
	}
});

app.controller('imagensController', function($scope, imagensService){

	$scope.listar = function(){
		imagensService.get().success(function(res){
			$scope.rows = chunk(res,4);
		});
	}

	$scope.upload = function(files){
		var fd = new FormData();
		fd.append('file',files[0]);
		imagensService.post(fd).success(function(res){
			$scope.listar();
		});
	}

	$scope.excluir = function(imagem){
		imagensService.delete(imagem.id).success(function(res){
			$scope.listar();
		});
	}

	function chunk(arr, size) {
		var newArr = [];
		for (var i=0; i<arr.length; i+=size) {
			newArr.push(arr.slice(i, i+size));
		}
		return newArr;
	}
});