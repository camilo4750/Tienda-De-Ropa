<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?= Base_url ?>assets/css/Web.css">

    <title>Document</title>
</head>

<body class="cover" style="background-image: url(<?=Base_url?>assets/img/sidebar3.jpg);">
<div class="card" style="height: 450%; width: 300px;   margin-left: 600px; margin-top: 150px; background: rgba(0, 0, 0, 0.5)">
	<div class="card-body">
		<h2 class="text-center text-white">Bienvenido</h2>
			<?php if (isset($_SESSION['error'])) :?>
		  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['error']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
				</div>
			<?php endif; ?>
			
			<?php Utilidades::DeleteSession(); ?>
		<hr class="bg-white">
	<form action="<?=Base_url?>persona/login" method="POST">
		<label class="text-white">Email</label>
		<input type="text" class="form-control" name="Email">
		<label class="text-white">Contraseña</label>
		<input type="text" class="form-control" name="Password">
		<input type="submit" class="btn btn-info btn-block mt-5" value="Ingresar">
	</form>
	<a href="<?=Base_url?>" class="btn btn-danger btn-block mt-3">Volver</a>
	<button type="button" class="btn btn-warning btn-block mt-3" data-toggle="modal" data-target="#exampleModalCenter">
  Registrate
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <form action="<?=Base_url?>persona/save" method="POST">
			  <label>Nombre</label>
			  <input type="text" class="form-control" name="Nombre">
			  <label>Apellido</label>
			  <input type="text" class="form-control" name="Apellidos">
			  <label>Email</label>
			  <input type="text" class="form-control" name="Email">
			  <label>Password</label>
			  <input type="password" class="form-control" name="Password">

			  <input type="submit" class="btn btn-success btn-block mt-3" value="Registrar">
		  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
	</div>
</div>