<?php
	session_start();
    //on recupere les fichiers pour se connecte a la BDD
    require_once 'config.php';
    require_once 'functions.php';
?>
<?php
	if(isset($_POST['message']) && !empty($_POST['message'])) {
		// Insertion du message à l'aide d'une requête préparée
		$req = $bdd->prepare('INSERT INTO tchat (pseudo, message, date_message) VALUES(?, ?, NOW())');
		$req->execute(array(htmlspecialchars($_SESSION['pseudo']), htmlspecialchars($_POST['message'])));
		$_SESSION['msg-admin'] = '';
		header("Location: tchat.php");// Redirection du visiteur vers la page tchat
	} else {
	    $_SESSION['msg-admin'] = 'Veuillez indiquer un message SVP';
	    header('Location: tchat.php');
	}	
?>