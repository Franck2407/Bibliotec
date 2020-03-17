<?php

  session_start();
  $nombre = $_POST['nombre'];

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-loginA');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM adminis WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /loginA/indexA.php");
    } else {
      $message = 'Usuario o contraseña no existe';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LoginA</title>
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

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar seción como Administrador</h1>
  
    <form action="/loginA/loginA.php" method="POST">
      <input name="email" type="text" placeholder="Escriba su correo">
      <input name="password" type="password" placeholder="Escriba su Contraseña">
      <input type="submit" value="Iniciar Seción">
      <br><a href="http://localhost/login/index.php" class="btn btn-primary">Regresar a Pagina Principal</a><a href="http://localhost/loginA/indexA.php" class="btn btn-primary">Regresar a Pagina Anteriror</a><br><br>
    </form>
  </body>
</html>
