<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <!-- <link rel="stylesheet" type="text/css" href="../css/root.css"> -->
  <title>LAMA</title>
  <meta name="keywords " content="LAMA">
  <meta name="author " content="Belloni Laura, Contegno Matteo">
</head>
<body>
<?php
require 'sessionStart.php';
if(!isset($_SESSION['id_utente'])){
    header("Location: accesso.php");
    exit();
}
?>
<h1>In costruzione</h1>

</body>
</html>