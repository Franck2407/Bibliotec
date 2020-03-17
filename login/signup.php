<?php

  require 'database.php';

  $message = '';
          
  $nombre = $_POST['nombre'];
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Nuevo Usuario Creado Correctamente';
    } else {
      $message = 'Error al crear Usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
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

    <h1>Registrarme</h1>
    <span>o <a href="login.php">Iniciar Seción</a></span>

    <form action="signup.php" method="POST">
    <input name="nombre" type="text" placeholder="Nombre Completo">
      <input name="email" type="text" placeholder="Correo Electrónico">
      <input name="password" type="password" placeholder="Escriba su Contraseña">
      <input name="confirm_password" type="password" placeholder="Repita su Contraseña">
      <input type="submit" value="Registrarme">
    </form>

  </body>
</html>
