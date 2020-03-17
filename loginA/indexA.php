<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM adminis WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a la Biblioteca</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br><h2>Bienvenido Administrador.</h2>  <h1><?= $user['correo']; ?></h1>
      
      <br> 📕Inicio de secion correctamente 📕
    
      <br><a href="/loginA/signupA.php" class="btn btn-primary">Registrar un Administrador</a><br><br>
      <br><br><a href="/loginA/logoutA.php" class="btn btn-primary">Cerrar seción</a>
      <br><br><a href="http://localhost/catalogoA/index.php" class="btn btn-primary">Catálogo de libros</a><br>

    <?php else: ?>

      <h1>Inicia seción </h1>

      
      <br><br><a href="/loginA/loginA.php" class="btn btn-primary">Iniciar seción</a><br>
      <br><a href="http://localhost/login/index.php" class="btn btn-primary">Regresar a Pagina Principal</a><br><br>


      
     
      
    <?php endif; ?>
  </body>
</html>

