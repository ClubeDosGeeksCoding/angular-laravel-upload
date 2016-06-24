<!DOCTYPE html>
<html ng-app="cdg">
<head>
	<title>Cadastro de Pessoas</title>
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">

	<script type="text/javascript" src="node_modules/jquery/jquery.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

	<!-- Angular -->
	<script type="text/javascript" src="node_modules/angular/angular.js"></script>

	<!-- App -->
	<script type="text/javascript" src="app/app.js"></script>
</head>
<body ng-controller="imagensController">
	<div class="container" ng-init="listar()">
		<h2>Upload de Imagens</h2>
		<div class="row">
			<div class="col-md-12">
				<input type="file" name="file" onchange="angular.element(this).scope().upload(this.files)" accept="image/*"/>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="row" ng-repeat="row in rows">
					<div class="col-md-3" ng-repeat="imagem in row">
						<div class="thumbnail">
							<img src="img/{{imagem.arquivo}}" class="img-responsive">
							<p>
								<button class="btn btn-danger btn-xs" ng-click="excluir(imagem)">&times;</button>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>