<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/root.css">
<link rel="stylesheet" type="text/css" href="../css/navbar.css">
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/profilo.css">
<title>LAMA</title>
<meta name="keywords " content="LAMA">
<meta name="author " content="Belloni Laura, Contegno Matteo">
</head>
<body>
<?php 
	include "sessionStart.php";
	include "db.php";
?>
<div class="top">
	<a href="home.php"><img class="logo" src="../assets/icon/navbar/logo.png" alt="logo LaMa"></a>
	<p> Impara con LaMa</p>
</div>

<?php
$connessione = new mysqli($hostData, $userData, $paswData, $database);
		if ($connessione->connect_error) {
			die("Connessione al database fallita: " . $connessione->connect_error);
			header("Location: show_profile.php");
			exit();
		}
		else{
			$sql = $connessione->prepare("SELECT * FROM Utenti WHERE email = ?");
			$sql->bind_param("s", $_SESSION['id_utente']);
			$sql->execute();
			$result = $sql->get_result();
			if ($result) {
				$row = $result->fetch_assoc();
			}
		}
?>
<div class="profilo">
	<div class="boxFormSx">
		<div class="header">
			<a href="modifica-avatar.php"><img  class="profilo" src="../assets/icon/navbar/<?php echo $row['imgAvatar']?>.png" alt="icona grafica stilizzata di una persona con i capelli castano il cappello nero e gli occhiali" height="300"></a>
			<p class= "boxTitle">Informazioni principali:</p>
		</div>
		<form method="post" action="update_profile.php">
			<input type="text" name="firstname" value="<?php echo $row['nome']; ?>">
			<input type="text" name="lastname" value="<?php echo $row['cognome']; ?>">
			<input type="text" name="email" value="<?php echo $row['email']; ?>">
			<input type="text" name="pass" value="**********">
		<div class="link"> 
			<a href="modifica-password.php" id="aRegister"> <U>Modifica password</U></a>
		</div>
	</div>
	<div class="boxFormDx">
		<p class="boxTitle">Ulteriori informazioni:</p>
			<input type="date" name="dataDiNascita" value="<?php echo $row['dataDiNascita']; ?>"><br>
			<input type="text" name="citta" value="<?php echo $row['citta']; ?>" placeholder="Città">
			<input type="text" name="professione" value="<?php echo $row['professione']; ?>" placeholder="Professione">
			<input type="text" name="colorePreferito" value="<?php echo $row['colorePreferito']; ?>" placeholder="Colore preferito">
			<input type="submit" name="submit" value="Aggiorna" class="button" rel="noopener noreferrer">
		</form>
	</div>
</div>
<?php
$sql->close();
$connessione->close();
?>

</body>
</html>